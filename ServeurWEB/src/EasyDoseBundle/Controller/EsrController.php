<?php
namespace EasyDoseBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Entity\Esr;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class EsrController  extends Controller
{
    
    

    public function loadAutocompleteDataAction(Request $request){
        
        $entityName=$request->get('entityName');
        $attrName=$request->get('attrName');
        $attrvalue=$request->get('attrvalue');
        
        
        return $this->get('utils')->loadAutocompleteData($entityName,$attrName,$attrvalue);
    }
    
    
    public  function testconvertAction($time){
        
        
        $response = new Response();
        
        
       
        $response->setContent(json_encode([
            'date' =>$this->ConvertTransformeDateToFrench(str_replace('+',' ',$time))
        ]));
        
        return $response;
    }
    
    public function deleteEsrAction($esrid){
        $this->deleteEsr($esrid);
        $response = new Response();
        $response->setContent(json_encode([
            'deleted' =>$esrid
        ]));
        return $response;
    }
    
    public function saveEsrValueAction(Request $request){
        $em=$this->getDoctrine()->getManager();
        $esr_id=$request->get('esr_id');
        $valuename=$request->get('valuename');
        $value=$request->get('value');
        
        if( $valuename=='idCritereDeclaration'){
            $value=$em->find('AppBundle\Entity\CritereEsr', $request->get('value'));
        }else if( $valuename=='patientesr'){
            $value=$em->find('AppBundle\Entity\Patient', $request->get('value'));
            $valuename="Patient";
        }
        else if( $valuename=='esreventpersonnel'){
            $value=$em->find('AppBundle\Entity\TypePersonnalEvent', $request->get('value'));
            $valuename="idTypePersonnalEvent";
        }else if( $valuename=='fonctiondeclarantesr'){
           // $value=$em->find('UserBundle\Entity\TypePersonnalEvent', $request->get('value'));
            $valuename="FonctionDeclarant";
        }
        else
           $value=$request->get('value');
        $response = new Response();
        try {
            
            $esr=$em->find('AppBundle\Entity\Esr', $esr_id);
            $setFunctionName='set'.ucfirst($valuename);
            $esr->$setFunctionName($value);           
            $em->persist($esr);
            $em->flush();
            $this->setCurrentEsr($esr);
            $response->setContent(json_encode([
                'update_done' =>true,
                'id_esr_updated' => $esr_id,
                'value' =>$value
            ]));
        } catch (\Exception $e) {
            $response->setContent(json_encode([
                'update_done' =>false,
                'exception' =>$e,
                'value' =>$value
            ]));
        }
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }
    
     
    
    private function getUrls($name){
        switch ($name) {
            case "getdeclarant":
                return array('img'=>'getimgdeclarant','idtemplate'=>'declarant');  
            case "getevent1":
                return array('img'=>'getimgevent1','idtemplate'=>'event1');  
            case "getevent2":
                return array('img'=>'getimgevent2','idtemplate'=>'event2');  
            case "getconsequences":
                return array('img'=>'getimgconsequences','idtemplate'=>'consequences');  
            case "getmesures":
                return array('img'=>'getimgmesures','idtemplate'=>'mesures');  
            case "getfin":
                return array('img'=>'getimgfin','idtemplate'=>'fin');  
        }
               
    }
    public function getpageEsrAction($idesr,$typepage){
        switch($typepage){
            
            //declarant
            case "getdeclarant":
                return $this->getDeclarant($idesr);
            case $this->getUrls('getdeclarant')['img']:
                return $this->getimgDeclarant($idesr);
                
                
           //evenement significatif 1
            case $this->getUrls('getevent1')['img']:
                return $this->getimgEvent1($idesr);
            case "getevent1":
                return $this->getEvent1($idesr);

                
            //evenement significatif 2
            case $this->getUrls('getevent2')['img']:
                return $this->getimgEvent2($idesr);
            case "getevent2":
                return $this->getEvent2($idesr);

                
                
                
            //conséquences
            case $this->getUrls('getconsequences')['img']:
                return $this->getimgConsequences($idesr);
            case "getconsequences":
                return $this->getConsequences($idesr);

                
                
                
            //mesures
            case $this->getUrls('getmesures')['img']:
                return $this->getimgMesures($idesr);
            case "getmesures":
                return $this->getMesures($idesr);
                
                
                
                
                
            //fin
            case $this->getUrls('getfin')['img']:
                return $this->getimgfin($idesr);
            case "getfin":
                return $this->getfin($idesr);
                
                
            //esr en cours
            case "getimgesrencours":
                return $this->getimgesrencours($idesr);
            case "getesrencours":
                return $this->getesrencours($idesr);
        }
        return null;
    }

    
    //Page informant que ESR en cours
    private function getimgesrencours($idesr){
        
        return $this->render('EasyDoseBundle:portlet/Esr:desc_event_img.html.twig',[
            'imgaddr'=>$this->container->get('assets.packages')->getUrl('assets/images/doctor-40891.svg')
        ]);
    }
    
    //define currentAction si ESR en cours()
    
    private function getCurrentPage(){
        
    }
    
   
    
    private function closeCurrentPage(){
        $this->get('session')->remove('currentesr');
    }
    
    
    private function getesrencours($idesr){
        
        //set current action
        $page=$this->get('userAction')->getCurrentEsrPage();
        
        return $this->render('EasyDoseBundle:portlet/Esr:esr_en_cours.html.twig',[
            'urlimg'=>$this->generateUrl('getpageesr',array('idesr'=>'0','typepage'=>$this->getUrls('getevent1')['img'])),
            'urlnext'=>$this->generateUrl('getpageesr',array('idesr'=>'0','typepage'=>$page)),
            'idtemplatenext' =>$this->getUrls($page)['idtemplate']
        ]);
    }
    
    
    public function esrAction($screenheigth){
        $em=$this->getDoctrine()->getManager();
        $ConnectedUser = $this->get ( 'core.security' )->getUser ();
        $etat=$em
        ->getRepository('AppBundle\Entity\Etat')
        ->findBy(
            array('libelle' => 'Cloture')
            )[0];
        $nbpages=$this->getNbPages($screenheigth);
        $this->savescreanAndOffset(0,$screenheigth);
        $nb=count($this->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle\Entity\Esr')
            ->findAll());
        $nbpagesToview=ceil($nb/$nbpages);
        $seuil=$em->getRepository('AppBundle\Entity\Parametre')->findBy( array('nom' => 'seuil_charge_declenchement_esr'))[0]->getValeur();
        
        $esrs=$this->getDoctrine()
        ->getManager()
        ->getRepository('AppBundle\Entity\Esr')
        ->getEsr($this->get('session')->get('offset')*$nbpages,$nbpages,$ConnectedUser,$etat,$seuil);
        
        
        return $this->render('EasyDoseBundle:Patient:esr.html.twig',
            ['offset'=>$this->get('session')->get('offset'),
                'esrs'=>$esrs,'screenheigth' =>$screenheigth,'nbpagesToview' =>$nbpagesToview]);
    }

    public function eiAction($screenheigth){
        $em=$this->getDoctrine()->getManager();
        $ConnectedUser = $this->get ( 'core.security' )->getUser ();
        $etat=$em
        ->getRepository('AppBundle\Entity\Etat')
        ->findBy(
            array('libelle' => 'Cloture')
            )[0];
        $nbpages=$this->getNbPages($screenheigth);
        $this->savescreanAndOffset(0,$screenheigth);
        $nb=count($this->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle\Entity\Esr')
            ->findAll());
        $nbpagesToview=ceil($nb/$nbpages);
        $seuil=$em->getRepository('AppBundle\Entity\Parametre')->findBy( array('nom' => 'seuil_charge_declenchement_esr'))[0]->getValeur();
        
        $esrs=$this->getDoctrine()
        ->getManager()
        ->getRepository('AppBundle\Entity\Esr')
        ->getEsr($this->get('session')->get('offset')*$nbpages,$nbpages,$ConnectedUser,$etat,$seuil);
        
        
        return $this->render('EasyDoseBundle:Patient:esr.html.twig',
            ['offset'=>$this->get('session')->get('offset'),
                'esrs'=>$esrs,'screenheigth' =>$screenheigth,'nbpagesToview' =>$nbpagesToview]);
    }
    
    public function meseiAction($screenheigth,$offset){
        $em=$this->getDoctrine()->getManager();
        $ConnectedUser = $this->get ( 'core.security' )->getUser ();
        $etat=$em
        ->getRepository('AppBundle\Entity\Etat')
        ->findBy(
            array('libelle' => 'Cloture')
            )[0];
        
        $nbpages=$this->getNbPages($screenheigth);
        $this->savescreanAndOffset($offset,$screenheigth);
        $nb=count($this->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle\Entity\Esr')
            ->findAll());
        
        
        $nbpagesToview=ceil($nb/$nbpages);
        
        
        $seuil=$em->getRepository('AppBundle\Entity\Parametre')->findBy( array('nom' => 'seuil_charge_declenchement_esr'))[0]->getValeur();
        
        
        
        $esrs=$this->getDoctrine()
        ->getManager()
        ->getRepository('AppBundle\Entity\Esr')
        ->getEsr($this->get('session')->get('offset')*$nbpages,$nbpages,$ConnectedUser,$etat,$seuil);
        
        return $this->render('EasyDoseBundle:portlet/Esr:mes_declarations.html.twig',[
            'screenheigth' =>$screenheigth,
            'esrs'=>$esrs,
            'nbpagesToview' => $nbpagesToview,
            'offset'=>$this->get('session')->get('offset')
            
        ]);
    }
    public function mesEsrAction($screenheigth,$offset){
        $em=$this->getDoctrine()->getManager();
        $ConnectedUser = $this->get ( 'core.security' )->getUser ();
        $etat=$em
        ->getRepository('AppBundle\Entity\Etat')
        ->findBy(
            array('libelle' => 'Cloture')
            )[0];
        
        $nbpages=$this->getNbPages($screenheigth);
        $this->savescreanAndOffset($offset,$screenheigth);
        $nb=count($this->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle\Entity\Esr')
            ->findAll());
        
        
        $nbpagesToview=ceil($nb/$nbpages);
        
        
        $seuil=$em->getRepository('AppBundle\Entity\Parametre')->findBy( array('nom' => 'seuil_charge_declenchement_esr'))[0]->getValeur();
        
        
        
        $esrs=$this->getDoctrine()
        ->getManager()
        ->getRepository('AppBundle\Entity\Esr')
        ->getEsr($this->get('session')->get('offset')*$nbpages,$nbpages,$ConnectedUser,$etat,$seuil);
        
        return $this->render('EasyDoseBundle:portlet/Esr:mes_declarations.html.twig',[
            'screenheigth' =>$screenheigth,
            'esrs'=>$esrs,
            'nbpagesToview' => $nbpagesToview,
            'offset'=>$this->get('session')->get('offset')
            
        ]);
    }
    
    public function getNbPages($size){
        
        return ceil(($size-300)/80);
    }
    
    public function savescreanAndOffset($offset,$screenheigth){
        if($offset !="-1")
            $this->get('session')->set('offset', $offset);
            $this->get('session')->set('screenheigth', $screenheigth);
    }
    
    
    
    public function viewesrsearchpatientAction(Request $request){
        
        $nom=$request->get('nom');
        $prenom=$request->get('prenom');
        $num=$request->get('num');
        $id=$request->get('id');
        $ed=$request->get('ed');
        return $this->render('EasyDoseBundle:portlet/Esr:view_search_patient.html.twig',[
            'nom' =>$nom,
            'prenom'=>$prenom,
            'num' => $num,
            'id' => $id,
            'ed' => $ed
            
        ]);
    }
    
    public function esrSearchFiltreAction($screenheigth,$offset){
        $em=$this->getDoctrine()->getManager();
        $ConnectedUser = $this->get ( 'core.security' )->getUser ();
        $etat=$em
        ->getRepository('AppBundle\Entity\Etat')
        ->findBy(
            array('libelle' => 'Cloture')
            )[0];
        $this->savescreanAndOffset($offset,$screenheigth);
        
        $nbpages=$this->getNbPages($screenheigth);
        $this->savescreanAndOffset($offset,$screenheigth);
        $nb=count($this->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle\Entity\Esr')
            ->findAll());
        $seuil=$em->getRepository('AppBundle\Entity\Parametre')->findBy( array('nom' => 'seuil_charge_declenchement_esr'))[0]->getValeur();
        
        
        $nbpagesToview=ceil($nb/$nbpages);
        
        $esrs=$this->getDoctrine()
        ->getManager()
        ->getRepository('AppBundle\Entity\Esr')->getEsr($this->get('session')->get('offset')*$nbpages,$nbpages,$ConnectedUser,$etat,$seuil);
        
        
        return $this->render('EasyDoseBundle:Patient:esr.html.twig',[ 
                    'screenheigth' =>$screenheigth,
                    'esrs'=>$esrs,                 
                    'nbpagesToview' => $nbpagesToview,
                    'offset'=>$this->get('session')->get('offset')
                    
        ]);
    }
        
    public function viewEsrAction($esrid){
        $em=$this->getDoctrine()
        ->getManager();
        $esr=$em->find('AppBundle\Entity\Esr', $esrid);
        if($esr->getDispositif() != null)
            $dispositif=$em->find('AppBundle\Entity\Dispositif',$esr->getDispositif());
        if($esr->getOrigine() != null)
            $origine=$em->find('AppBundle\Entity\OrigineEsr',$esr->getOrigine());
        return $this->render('EasyDoseBundle:portlet/Esr/viewer:view_esr.html.twig',[
            'esr'=>$esr,
            'dispositif'=>$dispositif,
            'origine'=>$origine,
            'groupes' =>$this->getDoctrine()->getManager()->getRepository('UserBundle\Entity\Group')->findAll(),
            'resp_nom' =>$em->getRepository('AppBundle\Entity\Parametre')->findBy( array('nom' => 'esr_resp_activite_nom'))[0]->getValeur(),
            'resp_prenom' =>$em->getRepository('AppBundle\Entity\Parametre')->findBy( array('nom' => 'esr_resp_activite_prenom'))[0]->getValeur(),
            'resp_email' =>$em->getRepository('AppBundle\Entity\Parametre')->findBy( array('nom' => 'esr_resp_activite_emal'))[0]->getValeur()
        ]);
    }
    
    
    public function testmailAction(){
        $ConnectedUser = $this->get ( 'core.security' )->getUser ();
        $patient=$this->getDoctrine()->getManager()->find('AppBundle\Entity\Patient', 10);
        return $this->render('EasyDoseBundle:Patient:mail.esralerte.html.twig',[
            'user'=>$ConnectedUser,
            'patient' => $patient,
            'etablissement' =>$this->getDoctrine()->getManager()->getRepository('AppBundle\Entity\Etablissement')->findAll()[0],
            'facteur' => 2,
            'color' =>'#CC0000',
            'bottomcolor' =>'#CC0000'
            //#243a51
        ]);
    }
    
    
    public function confirmactionAction($esrid){
        return $this->render('EasyDoseBundle:portlet/Esr:confirmeaction.html.twig',[
            'esrid'=>$esrid
        ]);
    }
    public function clotureEsrAction(){
        $currentesr_id=$this->getCurrentEsr()->getID();
        $em=$this->getDoctrine()->getManager();
        $esr=$em->find('AppBundle\Entity\Esr', $currentesr_id);
        $em=$this->getDoctrine()->getManager();
        $etat=$em
        ->getRepository('AppBundle\Entity\Etat')
        ->findBy(
            array('libelle' => 'Cloture')
            )[0];
        $esr->setEtat($etat);
        $esr->setDateSauvegarde(new \DateTime('now'));
        $esr->setUser($ConnectedUser = $this->get ('core.security' )->getUser());
        $em->persist($esr);
        $em->flush();
        $response = new Response();
        $response->setContent(json_encode([
            'cloture' =>'true'
        ]));
        $response->headers->set('Content-Type', 'application/json');
        
        //Supprimer ESR de la session$
        $this->closeCurrentPage();
        //$response->send();
        return $response;
    }
    
    private function setStep($idEsr,$idStep){
        
    }
    
    //Déclarant
    private function getimgDeclarant($idesr){
    
        return $this->render('EasyDoseBundle:portlet/Esr:desc_event_img.html.twig');
    }    
    private function getDeclarant($idesr){
        
        $this->get('userAction')->setCurrentEsrPage('getdeclarant');
       
        $this->setStep('$idesr','declarant');
        return $this->render('EasyDoseBundle:portlet/Esr:declarant.html.twig',[
            'urlimg'=>$this->generateUrl('getpageesr',array('idesr'=>'0','typepage'=>'getimgevent1')),
            'urlnext'=>$this->generateUrl('getpageesr',array('idesr'=>'0','typepage'=>'getevent1')),
            'idtemplatenext' =>'event1',
            'id_esr_courant' =>$this->getCurrentEsr()->getId(),
            'esr' => $this->getCurrentEsr(),
            'urlsaveesrvalue' => $this->generateUrl('saveesrvalue'),
            'groupes' => $this->getDoctrine()->getManager()->getRepository('UserBundle\Entity\Group')->findAll()
        ]);
    }
    
    public function show_desc_dispositifAction($dispositif_id){
        
        return $this->render('EasyDoseBundle:portlet/Esr:show_desc_dispositif.html.twig',[
            'dispositif'=>$this->getDoctrine()->getManager()->find('AppBundle\Entity\Dispositif', $dispositif_id)
        ]);
    }
    private function createEsr(){
        $ConnectedUser = $this->get ( 'core.security' )->getUser ();
        $em=$this->getDoctrine()->getManager();
        $etat=$em
        ->getRepository('AppBundle\Entity\Etat')
        ->findBy(
            array('libelle' => 'Encours')
            )[0];
        $esr = new Esr();
        $esr->setUser($ConnectedUser);
        $esr->setEtat($etat);
        $etablissement=$this->getDoctrine()
        ->getManager()
        ->getRepository('AppBundle\Entity\Etablissement')
        ->findAll()[0];
        $esr->setEtablissement($etablissement);
        $esr->setType('manuel');
        $em->persist($esr);
        $em->flush();
            
        return $esr;
    }
    
    
    
    private function deleteEsr($esrid){

        $em=$this->getDoctrine()->getManager();
        $esr=$em->find('AppBundle\Entity\Esr', $esrid);
        $em->remove($esr);
       
        $em->flush();
    }
    
    public function deletepatientEsrAction($esrid){
        
        $em=$this->getDoctrine()->getManager();
        $esr=$em->find('AppBundle\Entity\Esr', $esrid);
        $esr->setPatient(null);
        $this->setCurrentEsr($esr);
        $em->flush();
        //dump($esr);
       // die;
        $response = new Response();
        $response->setContent(json_encode([
            'patientdeleted_esr_id' =>$esr->getId()
        ]));
        $response->headers->set('Content-Type', 'application/json');
        //$response->send();
        return $response;
    }
    
    
    public function deletetypepersoEsrAction($esrid){
        
        $em=$this->getDoctrine()->getManager();
        $esr=$em->find('AppBundle\Entity\Esr', $esrid);
        $esr->setIdTypePersonnalEvent(null);
        //$em->persist($esr);
        $em->flush();
        $this->setCurrentEsr($esr);
        $response = new Response();
        $response->setContent(json_encode([
            'personneldeleted_esr_id' =>$esr->getId()
        ]));
        $response->headers->set('Content-Type', 'application/json');
        //$response->send();
        return $response;
    }
    
    //Création d'un nouvel esr en base
    public function createEsrAction(){
        
        $this->setCurrentEsr($esr);
        $response = new Response();
        $response->setContent(json_encode([
            'esr_id' =>$esr->getId()
        ]));
        $response->headers->set('Content-Type', 'application/json');
        //$response->send();
        return $response;
    }
    
    //Enregistrement de l'esr courant
    private function setCurrentEsr($esr){
        $this->get('session')->set('currentesr', $esr);
    }
    
    //Enregistrement de l'esr courant
    private function setCurrentEsrForUpdate($esr){
        $this->get('session')->set('currentesrforupdate', $esr);
    }

    //Enregistrement de l'esr courant
    private function deleteCurrentEsrForUpdate(){
        $this->get('session')->Remove('currentesrforupdate');
    }
    //Enregistrement de l'esr courant
    private function getCurrentEsrForUpdate(){
        return $this->get('session')->get('currentesrforupdate');
    }
    
    
    public function deleteCurrentEsrForUpdateAction(){
        $this->deleteCurrentEsrForUpdate();
        $response = new Response();
        $response->setContent(json_encode([
            'update_done' =>true
        ]));
        $response->headers->set('Content-Type', 'application/json');
        //$response->send();
        return $response;
    }
    
        
    public function saveEsrInSessionAction($id_esr){
        $esr=$this->getEsr($id_esr);
        $this->setCurrentEsr($esr);
        $response = new Response();
        $response->setContent(json_encode([
            'esrset' =>$id_esr
        ]));
        $response->headers->set('Content-Type', 'application/json');
        //$response->send();
        return $response;
    }

    public function saveEsrInSessionforupdateAction($id_esr){
        $esr=$this->getEsr($id_esr);
        $this->setCurrentEsrForUpdate($esr);
        $response = new Response();
        $response->setContent(json_encode([
            'esrset' =>$id_esr
        ]));
        $response->headers->set('Content-Type', 'application/json');
        //$response->send();
        return $response;
    }
    
    //récupération l'esr courant
    private function getCurrentEsr(){
        return $this->get('session')->get('currentesr');
    }
    
    
    private function currentUserHaveWaitingEsr(){
        $ConnectedUser = $this->get ('core.security' )->getUser();
        $em=$this->getDoctrine()->getManager();
        return $em->getRepository('AppBundle\Entity\Esr')->haveWaitingEsr($ConnectedUser);
    }
    
    //vérification si ESR en cours present
    public function getOpeningEsrPageAction($esrid){
        $response = new Response();
        $openingpage="";
        $type="";
        //$esrforupdate=null;//$this->getCurrentEsrForUpdate();
        $esrforupdate=$this->getEsr($esrid);
        if($esrforupdate != null)
        {
            $esr=$esrforupdate;
            $openingpage=$this->generateUrl('getpageesr',array('idesr'=>$esr->getId(),'typepage'=>'getdeclarant'));
            $openingimagepage=$this->generateUrl('getpageesr',array('idesr'=>$esr->getId(),'typepage'=>'getimgdeclarant'));
        }else{
            //Obtention ESRCourant
            /*$current_esr= $this->getCurrentEsr();
            
            if($current_esr == null)//si null obtention de l'ESR en court de rédaction
                $esr=$this->getWaitingEsrID();        
            else
                $esr=$this->getEsr($current_esr->getId()); // Sinon création de nouvel ESr
                       
            if($esr != null)
            { */
              //  $openingpage=$this->generateUrl('getpageesr',array('idesr'=>$esr->getId(),'typepage'=>'getesrencours'));
              //  $openingimagepage=$this->generateUrl('getpageesr',array('idesr'=>$esr->getId(),'typepage'=>'getimgdeclarant'));
            /*}
            else
            {*/
                $esr=$this->createEsr();
                $openingpage=$this->generateUrl('getpageesr',array('idesr'=>$esr->getId(),'typepage'=>'getdeclarant'));
                $openingimagepage=$this->generateUrl('getpageesr',array('idesr'=>$esr->getId(),'typepage'=>'getimgdeclarant'));
                $type='new';
            //}
        }
        $this->setCurrentEsr($esr);
        $response->setContent(json_encode([
            'openingpage' =>$openingpage,
            'openingimagepage' => $openingimagepage,
            'id_esr_courant' =>$esr->getId(),
            'type' => $type
        ]));
        $response->headers->set('Content-Type', 'application/json');
        //$response->send();
        return $response;
        
    }
    
    
    //vérification si ESR en cours present    
    public function haveWaitingEsrAction(){
        
        $response = new Response();
        $esr=$this->getWaitingEsrID();
        $idesr=-1;
        if($esr!=null)
            $idesr=$esr->getId();
        $response->setContent(json_encode([
            'haveWaitingEsr' =>$this->currentUserHaveWaitingEsr(),
            'idWaitingEsr' => $idesr
        ]));
        $response->headers->set('Content-Type', 'application/json');
        //$response->send();
        return $response;
        
    }
    
    
    private function getWaitingEsrID(){
        $ConnectedUser = $this->get ('core.security' )->getUser();
        $em=$this->getDoctrine()->getManager();
        $listesr=$em->getRepository('AppBundle\Entity\Esr')->getWaitingEsr($ConnectedUser);
        
        if(count($listesr)>0)
            return $listesr[0];
        return null;
    }
 
    private function getEsr($esrid){
       return $this->getDoctrine()->getManager()->find('AppBundle\Entity\Esr', $esrid);
    }
    
    
    private function getWaitingEsr(){
        $ConnectedUser = $this->get ('core.security' )->getUser();
        $em=$this->getDoctrine()->getManager();
        $listesr=$em->getRepository('AppBundle\Entity\Esr')->getWaitingEsr($ConnectedUser);
        
        if(count($listesr)>0)
            return $listesr[0];
       return new Esr();
    }
    
    //Obtenir  ESR en cours    
    public function getWaitingEsrAction(){
        
        $response = new Response();
        $response->setContent(json_encode([
            'esr_id' =>$this->getWaitingEsrID()->getId()
        ]));
        $response->headers->set('Content-Type', 'application/json');
        //$response->send();
        return $response;
        
    }
    
    //Evenement significatif 1
    private function getimgEvent1($idesr){
        
        return $this->render('EasyDoseBundle:portlet/Esr:desc_event_img.html.twig');
    }    
    private function getEvent1($idesr){
        $this->get('userAction')->setCurrentEsrPage('getevent1');
        $this->setStep('$idesr','event1');
        return $this->render('EasyDoseBundle:portlet/Esr:desc_event.html.twig',[
            //next
            'urlimg'=>$this->generateUrl('getpageesr',array('idesr'=>'0','typepage'=>'getimgevent2')),
            'urlnext'=>$this->generateUrl('getpageesr',array('idesr'=>'0','typepage'=>'getevent2')),
            'idtemplatenext' =>'event2',
            //pre
            'urlimgprece'=>$this->generateUrl('getpageesr',array('idesr'=>'0','typepage'=>'getimgdeclarant')),
            'urlprece'=>$this->generateUrl('getpageesr',array('idesr'=>'0','typepage'=>'getdeclarant')),
            'idtemplateprecedent'=>'declarant',
            'id_esr_courant' =>$this->getCurrentEsr()->getId(),
            'esr' => $this->getCurrentEsr(),
            'urlsaveesrvalue' => $this->generateUrl('saveesrvalue'),
            'criteres' =>  $this->getDoctrine()->getManager()->getRepository('AppBundle\Entity\CritereEsr')->findAll()
        ]);
    }
    
    
    
    //Evenement significatif 2
    private function getimgEvent2($idesr){
        
        return $this->render('EasyDoseBundle:portlet/Esr:desc_event_img.html.twig',[
            'imgaddr'=>$this->container->get('assets.packages')->getUrl('assets/images/doctor-40891.svg')
        ]);
    }    
    private function getEvent2($idesr){
        $this->get('userAction')->setCurrentEsrPage('getevent2');
        $this->setStep('$idesr','event2');
        $esr=$this->getCurrentEsr();
        if($esr->getPatient()!=null)
            $patient=$this->getDoctrine()->getManager()->find('AppBundle\Entity\Patient', $esr->getPatient()->getId());
        return $this->render('EasyDoseBundle:portlet/Esr:desc_event2.html.twig',[
            //next
            'urlimg'=>$this->generateUrl('getpageesr',array('idesr'=>'0','typepage'=>'getimgconsequences')),
            'urlnext'=>$this->generateUrl('getpageesr',array('idesr'=>'0','typepage'=>'getconsequences')),
            'idtemplatenext' =>'consequences',
            //pre
            'urlimgprece'=>$this->generateUrl('getpageesr',array('idesr'=>'0','typepage'=>'getimgevent1')),
            'urlprece'=>$this->generateUrl('getpageesr',array('idesr'=>'0','typepage'=>'getevent1')),
            'idtemplateprecedent'=>'event1',
            'id_esr_courant' =>$this->getCurrentEsr()->getId(),
            'esr' => $esr,
            'typepersonnevent' => $this->getDoctrine()->getManager()->getRepository('AppBundle\Entity\TypePersonnalEvent')->findAll(),
            'patient' => $patient,
            'urlsaveesrvalue' => $this->generateUrl('saveesrvalue'),
            'origines' => $this->getDoctrine()->getManager()->getRepository('AppBundle\Entity\OrigineEsr')->findAll(),
            'dispositifs' =>  $this->getDoctrine()->getManager()->getRepository('AppBundle\Entity\Dispositif')->findAll(),
            'dispositifCourant' => ($esr->getDispositif()==null)?null:$this->getDoctrine()->getManager()->find('AppBundle\Entity\Dispositif', $esr->getDispositif())
        ]);
    }
    
    
    
    
    
    //consequences
    private function getimgConsequences($idesr){
        
        return $this->render('EasyDoseBundle:portlet/Esr:desc_event_img.html.twig',[
            'imgaddr'=>$this->container->get('assets.packages')->getUrl('assets/images/doctor-40891.svg')
        ]);
    }
    private function getConsequences($idesr){
        $this->get('userAction')->setCurrentEsrPage('getconsequences');
        $this->setStep('$idesr','consequences');
        return $this->render('EasyDoseBundle:portlet/Esr:consequence.html.twig',[
            //next
            'urlimg'=>$this->generateUrl('getpageesr',array('idesr'=>'0','typepage'=>'getimgmesures')),
            'urlnext'=>$this->generateUrl('getpageesr',array('idesr'=>'0','typepage'=>'getmesures')),
            'idtemplatenext' =>'mesures',
            //pre
            'urlimgprece'=>$this->generateUrl('getpageesr',array('idesr'=>'0','typepage'=>'getimgevent2')),
            'urlprece'=>$this->generateUrl('getpageesr',array('idesr'=>'0','typepage'=>'getevent2')),
            'idtemplateprecedent'=>'event2',
            'urlsaveesrvalue' => $this->generateUrl('saveesrvalue'),
            'id_esr_courant' =>$this->getCurrentEsr()->getId(),
            'esr' => $this->getCurrentEsr(),
        ]);
    }
    
    
    //mesures
    private function getimgMesures($idesr){
        
        return $this->render('EasyDoseBundle:portlet/Esr:desc_event_img.html.twig',[
            'imgaddr'=>$this->container->get('assets.packages')->getUrl('assets/images/doctor-40891.svg')
        ]);
    }
    private function getMesures($idesr){
        $this->get('userAction')->setCurrentEsrPage('getmesures');
        $this->setStep('$idesr','mesures');
        return $this->render('EasyDoseBundle:portlet/Esr:mesures.html.twig',[
            //next
            'urlimg'=>$this->generateUrl('getpageesr',array('idesr'=>'0','typepage'=>'getimgfin')),
            'urlnext'=>$this->generateUrl('getpageesr',array('idesr'=>'0','typepage'=>'getfin')),
            'idtemplatenext' =>'fin',
            //pre
            'urlimgprece'=>$this->generateUrl('getpageesr',array('idesr'=>'0','typepage'=>'getimgconsequences')),
            'urlprece'=>$this->generateUrl('getpageesr',array('idesr'=>'0','typepage'=>'getconsequences')),
            'idtemplateprecedent'=>'consequences',
            'urlsaveesrvalue' => $this->generateUrl('saveesrvalue'),
            'id_esr_courant' =>$this->getCurrentEsr()->getId(),
            'esr' => $this->getCurrentEsr(),
        ]);
    }
    
    
    
    
    //mesures
    private function getimgfin($idesr){
        
        return $this->render('EasyDoseBundle:portlet/Esr:desc_event_img.html.twig',[
            'imgaddr'=>$this->container->get('assets.packages')->getUrl('assets/images/doctor-40891.svg')
        ]);
    }
    private function getfin($idesr){
        $this->get('userAction')->setCurrentEsrPage('getfin');
        return $this->render('EasyDoseBundle:portlet/Esr:fin.html.twig',
            [
                'urlimgprece'=>$this->generateUrl('getpageesr',array('idesr'=>'0','typepage'=>'getimgmesures')),
                'urlprece'=>$this->generateUrl('getpageesr',array('idesr'=>'0','typepage'=>'getmesures')),
                'idtemplateprecedent' =>'mesures',
            ]);
        
    }
}


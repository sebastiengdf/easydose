<?php

namespace AppBundle\Repository;

/**
 * EsrRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class EsrRepository extends \Doctrine\ORM\EntityRepository
{
    
    public function haveWaitingEsr($user){
        $qb = $this->createQueryBuilder('e');
        $qb->innerJoin('e.user', 'u')
        ->innerJoin('e.etat', 's')
        ->innerJoin('e.souscategorie', 's')
        ->where('s.libelle = :etatenattent')
        ->andwhere('s.codeSouscategorie IN (:categorie)')
        ->andWhere('u = :utilisateur')
        ->setParameter('etatenattent','Encours')
        ->setParameter('categorie','01')
        ->setParameter('utilisateur',$user);
        return count($qb->getQuery()->getResult())>0;
        
    }

    public function haveWaitingEi($user){
        $qb = $this->createQueryBuilder('e');
        $qb->innerJoin('e.user', 'u')
        ->innerJoin('e.etat', 's')
        ->innerJoin('e.souscategorie', 's')
        ->where('s.libelle = :etatenattent')
        ->andwhere('s.codeSouscategorie NOT IN (:categorie)')
        ->andWhere('u = :utilisateur')
        ->setParameter('etatenattent','Encours')
        ->setParameter('categorie','01')
        ->setParameter('utilisateur',$user);
        return count($qb->getQuery()->getResult())>0;
        
    }
    
    public function examensHaveSer($examenid){
        $qb = $this->createQueryBuilder('e');
        $qb->innerJoin('e.examen', 'ex');
        $qb->where('ex.id = :examenid');
        $qb->setParameter('examenid',$examenid);
        
        return count($qb->getQuery()->getResult())>0;
    }
    
   public function getWaitingEsr($user){
        $qb = $this->createQueryBuilder('e');
        $qb->innerJoin('e.user', 'u')
        ->innerJoin('e.etat', 's')
        ->where('s.libelle = :etatenattent')
        ->andWhere('u = :utilisateur')
        ->setParameter('etatenattent','Encours')
        ->setParameter('utilisateur',$user);
        
        return $qb->getQuery()->getResult();
        
    }
    
    public function getEsr($offset,$nbelement,$user,$etat,$seuil){
        $qb = $this->createQueryBuilder('e');
        $qb->innerJoin('e.souscategorie', 's'); 
        $qb->where('s.codeSouscategorie IN (:categorie)');
        $qb->leftJoin('e.user', 'u');        
        $qb->leftJoin('e.examen', 'x'); 
        $qb->leftJoin('x.region', 'r');
        $qb->leftJoin('r.regiondose', 'rd');
        $qb->leftJoin('rd.dose', 'd');
        $qb->andWhere('u = :utilisateur');
        //if($etat and $etat<>'null'){
        //    $qb->andWhere('e.etat = :etat');
        //}
        //if($seuil and $seuil<>'null'){
        //    $qb->andWhere('d.xrayTubeCurren2 > :seuil');
        //}
        $qb->setParameter('utilisateur',$user);
        //if($etat and $etat<>'null'){
        //    $qb->setParameter('etat',$etat);
        //}
        //if($seuil and $seuil<>'null'){
        //    $qb->setParameter('seuil',$seuil);
        //}
        $qb->setParameter('categorie','01');
        $qb->orderBy('e.id', 'DESC');
        $qb->setMaxResults($nbelement);
        $qb->setFirstResult($offset);
        return $qb->getQuery()->getResult();
        
    }
    
    public function getEiSearch($offset,$nbelement,$user,$etat,$seuil,$categorie,$souscategorieslist,$datedebut,$datefin){
        $qb = $this->createQueryBuilder('e');
        $qb->innerJoin('e.souscategorie', 's'); 
        $qb->leftJoin('e.user', 'u'); 
        
        $qb->leftJoin('e.etat', 't');          
        //$qb->leftJoin('e.examen', 'x'); 
        //$qb->leftJoin('x.region', 'r');
        //$qb->leftJoin('r.regiondose', 'rd');
        //$qb->leftJoin('rd.dose', 'd');        
        $qb->where('s.codeSouscategorie NOT IN (:categorie)');
        if($souscategorieslist and $souscategorieslist<>'null')
            $qb->andWhere('s.id IN (:souscategorie)');
        
        $qb->andWhere('s.codeSouscategorie IS NOT NULL');
        //$qb->andWhere('e.datedecla IS NOT NULL');
        $qb->andWhere('u = :utilisateur   OR t.libelle=:valide');
        //dump($seuil);
        //dd($etat);

        //if($categorie and $categorie<>'null'){
        //    $qb->andWhere('e.souscategorie in (:categories)');
        //}

        if($datedebut and $datedebut<>'null'){
            $qb->andWhere('e.datedecla >= :datedebut');
        }
        if($datefin and $datefin<>'null'){
            $qb->andWhere('e.datedecla <= :datefin');
        }
        //if($seuil and $seuil<>'null'){
        //    $qb->andWhere('d.xrayTubeCurren2 > :seuil');
        //}        
        $qb->setParameter('utilisateur',$user);
        //if($etat and $etat<>'null'){
        //    $qb->setParameter('etat',$etat);
        //}
        //if($seuil and $seuil<>'null'){
        //    $qb->setParameter('seuil',$seuil);
        //}
        $qb->setParameter('categorie','01');
        if($datedebut and $datedebut<>'null'){
            $qb->setParameter('datedebut',$datedebut);
        }
        if($datefin and $datefin<>'null'){
            $qb->setParameter('datefin',$datefin);
        }
        if($souscategorieslist and $souscategorieslist<>'null'){
            $qb->setParameter('souscategorie',$souscategorieslist);
        }
        $qb->setParameter('valide','Cloture');  
        $qb->orderBy('e.id', 'DESC');
        $qb->setMaxResults($nbelement);
        $qb->setFirstResult($offset);
        
       // dump($qb->getQuery());
        return $qb->getQuery()->getResult();
        
    }

    public function countEi($user){
        $qb = $this->createQueryBuilder('e');
        $qb->innerJoin('e.souscategorie', 's');
        $qb->leftJoin('e.user', 'u'); 
        $qb->leftJoin('e.etat', 't');  
        $qb->where('s.codeSouscategorie NOT IN (:categorie)');
        $qb->andWhere('u = :utilisateur OR t.libelle=:valide');
        $qb->setParameter('utilisateur',$user);
        $qb->setParameter('categorie','01');
        $qb->setParameter('valide','Cloture'); 
        $qb->orderBy('e.id', 'DESC');
       
       // dump($qb->getQuery());
        return count($qb->getQuery()->getResult());
        
    }

    public function countEiSearch($offset,$nbelement,$user,$etat,$seuil,$categorie,$souscategorieslist,$datedebut,$datefin){
        $qb = $this->createQueryBuilder('e');
        $qb->innerJoin('e.souscategorie', 's'); 
        $qb->leftJoin('e.user', 'u'); 
        $qb->leftJoin('e.etat', 't');        
        //$qb->leftJoin('e.examen', 'x'); 
        //$qb->leftJoin('x.region', 'r');
        //$qb->leftJoin('r.regiondose', 'rd');
        //$qb->leftJoin('rd.dose', 'd');        
        $qb->where('s.codeSouscategorie NOT IN (:categorie)');
        if($souscategorieslist and $souscategorieslist<>'null')
            $qb->andWhere('s.id IN (:souscategorie)');
        
        $qb->andWhere('s.codeSouscategorie IS NOT NULL');
        //$qb->andWhere('e.datedecla IS NOT NULL');
        $qb->andWhere('u = :utilisateur  OR t.libelle=:valide');
        //dump($seuil);
        //dd($etat);

        //if($categorie and $categorie<>'null'){
        //    $qb->andWhere('e.souscategorie in (:categories)');
        //}

        if($datedebut and $datedebut<>'null'){
            $qb->andWhere('e.datedecla >= :datedebut');
        }
        if($datefin and $datefin<>'null'){
            $qb->andWhere('e.datedecla <= :datefin');
        }
        //if($seuil and $seuil<>'null'){
        //    $qb->andWhere('d.xrayTubeCurren2 > :seuil');
        //}        
        $qb->setParameter('utilisateur',$user);
        //if($etat and $etat<>'null'){
        //    $qb->setParameter('etat',$etat);
        //}
        //if($seuil and $seuil<>'null'){
        //    $qb->setParameter('seuil',$seuil);
        //}
        $qb->setParameter('categorie','01');
        if($datedebut and $datedebut<>'null'){
            $qb->setParameter('datedebut',$datedebut);
        }
        if($datefin and $datefin<>'null'){
            $qb->setParameter('datefin',$datefin);
        }
        if($souscategorieslist and $souscategorieslist<>'null'){
            $qb->setParameter('souscategorie',$souscategorieslist);
        }
        $qb->setParameter('valide','Cloture');  
        $qb->orderBy('e.id', 'DESC');
        $qb->setMaxResults($nbelement);
        $qb->setFirstResult($offset);
        
       // dump($qb->getQuery());
        return count($qb->getQuery()->getResult());
        
    }
    public function getEi($offset,$nbelement,$user,$etat,$seuil){
        $qb = $this->createQueryBuilder('e');
        $qb->innerJoin('e.souscategorie', 's'); 
        $qb->leftJoin('e.user', 'u');        
        $qb->leftJoin('e.examen', 'x');
        $qb->leftJoin('e.etat', 't');  
        $qb->leftJoin('x.region', 'r');
        $qb->leftJoin('r.regiondose', 'rd');
        $qb->leftJoin('rd.dose', 'd');        
        $qb->where('s.codeSouscategorie NOT IN (:categorie)');
        $qb->andWhere('s.codeSouscategorie IS NOT NULL');
        $qb->andWhere('u = :utilisateur OR t.libelle=:valide');
        //dump($seuil);
        //dd($etat);
        //if($etat and $etat<>'null'){
        //    $qb->andWhere('e.etat = :etat');
        //}
        //if($seuil and $seuil<>'null'){
        //    $qb->andWhere('d.xrayTubeCurren2 > :seuil');
        //}        
        $qb->setParameter('utilisateur',$user);
        //if($etat and $etat<>'null'){
        //    $qb->setParameter('etat',$etat);
        //}
        //if($seuil and $seuil<>'null'){
        //    $qb->setParameter('seuil',$seuil);
        //}
        $qb->setParameter('categorie','01');
        $qb->setParameter('valide','Cloture');        
        $qb->orderBy('e.id', 'DESC');
        $qb->setMaxResults($nbelement);
        $qb->setFirstResult($offset);
        return $qb->getQuery()->getResult();
        
    }
}
    
    

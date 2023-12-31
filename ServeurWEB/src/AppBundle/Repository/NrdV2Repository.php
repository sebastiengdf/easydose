<?php

namespace AppBundle\Repository;

/**
 * NrdV2Repository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class NrdV2Repository extends \Doctrine\ORM\EntityRepository
{
    
    public function searchFiltre($typeexamen,$protocole,$trancheAge,$taillesuppressionnomproto){
        
        if($taillesuppressionnomproto>0 && strlen($protocole)>$taillesuppressionnomproto+4)
            $proto='%'.substr($protocole,$taillesuppressionnomproto,strlen($protocole));
        else
            $proto=$protocole;
        $qb = $this->createQueryBuilder('n');
        $qb->select('n');
        $qb->where('n.type = :typeexamen')
        ->andwhere('n.protocole like :protocole')
        ->andwhere('n.age = :trancheAge')
        ->setParameter('typeexamen',$typeexamen)
        ->setParameter('protocole',$proto)
        ->setParameter('trancheAge',$trancheAge);      
        
        $query=$qb->getQuery();
        //$query=$querybuilder->getQuery();
        
        $result=$query->getResult();
       // dump($query);
      // dump($protocole);
       // dump('%'.substr($protocole,4,strlen($protocole)).'%');
     //   dump($proto);
      //  dump($result);
      //  die;
        return $result;
    }
}

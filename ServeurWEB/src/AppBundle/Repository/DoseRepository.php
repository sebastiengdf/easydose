<?php

namespace AppBundle\Repository;

/**
 * DoseRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class DoseRepository extends \Doctrine\ORM\EntityRepository
{
	
	public function getdetaildose($dose){
		$qb = $this->createQueryBuilder('d');
		$qb->innerJoin('d.detail_dose', 'dd')
		->where('d IN (:ds)')
		->setParameter('ds', $dose);
			
		return $qb->getQuery()->getResult();
	}
}

<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
/**
 * Patient
 * @ApiResource(
 *     collectionOperations={"get"},
 *     itemOperations={"get", "put", "delete"},
 *     paginationEnabled=true,
 *     paginationItemsPerPage= 10,
 *     paginationClientPartial= true, 
 * 	   attributes={"order"={"datelastexam"="DESC"}}
 * )
 * @ORM\Table(name="patient")
 * @ORM\Entity
 */
class Patient
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255, nullable=false)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=255, nullable=false)
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="numipp", type="string", length=255, nullable=false)
     */
    private $numipp;

    /**
     * @var string
     *
     * @ORM\Column(name="uniteage", type="string", length=255, nullable=false)
     */
    private $uniteage;

    /**
     * @var string
     *
     * @ORM\Column(name="sex", type="string", length=255, nullable=false)
     */
    private $sex;

    /**
     * @var string|null
     *
     * @ORM\Column(name="idregional", type="string", length=255, nullable=true)
     */
    private $idregional;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datenaissance", type="datetime", nullable=false)
     */
    private $datenaissance;

    /**
     * @var int
     *
     * @ORM\Column(name="age", type="integer", nullable=false)
     */
    private $age;

    /**
     * @var int
     *
     * @ORM\Column(name="nbdoses", type="integer", nullable=false)
     */
    private $nbdoses;

    /**
     * @var bool
     *
     * @ORM\Column(name="nrdhavealerte", type="boolean", nullable=false)
     */
    private $nrdhavealerte;

    /**
     * @var bool
     *
     * @ORM\Column(name="sumhavealerte", type="boolean", nullable=false)
     */
    private $sumhavealerte;

    /**
     * @var bool
     *
     * @ORM\Column(name="havenotes", type="boolean", nullable=false)
     */
    private $havenotes;
    
    
    /**
     * @var int
     *
     * @ORM\Column(name="patientid", type="integer", nullable=false, options={"default" : 0})
     */
    private $patientid;


	 /**
     * @var boolean
     *
     * @ORM\Column(name="havemammo", type="boolean")
     */
    private $havemammo;
    
    /**
     * @var boolean
     *
     * @ORM\Column(name="haveradio", type="boolean")
     */
    private $haveradio;

    /**
     * @var boolean
     *
     * @ORM\Column(name="havescanner", type="boolean")
     */
    private $havescanner;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datelastexam", type="datetime", nullable=true)
     */
    private $datelastexam;
	
	/**
	 * 
	 * @return int
	 */
	public function getPatientid() {
		return $this->patientid;
	}
	
	/**
	 * 
	 * @param int $patientid 
	 * @return self
	 */
	public function setPatientid($patientid): self {
		$this->patientid = $patientid;
		return $this;
	}

	/**
	 * 
	 * @return bool
	 */
	public function getHavenotes() {
		return $this->havenotes;
	}
	
	/**
	 * 
	 * @param bool $havenotes 
	 * @return self
	 */
	public function setHavenotes($havenotes): self {
		$this->havenotes = $havenotes;
		return $this;
	}

	/**
	 * 
	 * @return bool
	 */
	public function getSumhavealerte() {
		return $this->sumhavealerte;
	}
	
	/**
	 * 
	 * @param bool $sumhavealerte 
	 * @return self
	 */
	public function setSumhavealerte($sumhavealerte): self {
		$this->sumhavealerte = $sumhavealerte;
		return $this;
	}

	/**
	 * 
	 * @return bool
	 */
	public function getNrdhavealerte() {
		return $this->nrdhavealerte;
	}
	
	/**
	 * 
	 * @param bool $nrdhavealerte 
	 * @return self
	 */
	public function setNrdhavealerte($nrdhavealerte): self {
		$this->nrdhavealerte = $nrdhavealerte;
		return $this;
	}

	/**
	 * 
	 * @return int
	 */
	public function getNbdoses() {
		return $this->nbdoses;
	}
	
	/**
	 * 
	 * @param int $nbdoses 
	 * @return self
	 */
	public function setNbdoses($nbdoses): self {
		$this->nbdoses = $nbdoses;
		return $this;
	}

	/**
	 * 
	 * @return int
	 */
	public function getAge() {
		return $this->age;
	}
	
	/**
	 * 
	 * @param int $age 
	 * @return self
	 */
	public function setAge($age): self {
		$this->age = $age;
		return $this;
	}

	/**
	 * 
	 * @return \DateTime
	 */
	public function getDatenaissance() {
		return $this->datenaissance;
	}
	
	/**
	 * 
	 * @param \DateTime $datenaissance 
	 * @return self
	 */
	public function setDatenaissance($datenaissance): self {
		$this->datenaissance = $datenaissance;
		return $this;
	}

	/**
	 * 
	 * @return string|null
	 */
	public function getIdregional() {
		return $this->idregional;
	}
	
	/**
	 * 
	 * @param string|null $idregional 
	 * @return self
	 */
	public function setIdregional($idregional): self {
		$this->idregional = $idregional;
		return $this;
	}

	/**
	 * 
	 * @return string
	 */
	public function getSex() {
		return $this->sex;
	}
	
	/**
	 * 
	 * @param string $sex 
	 * @return self
	 */
	public function setSex($sex): self {
		$this->sex = $sex;
		return $this;
	}

	/**
	 * 
	 * @return string
	 */
	public function getUniteage() {
		return $this->uniteage;
	}
	
	/**
	 * 
	 * @param string $uniteage 
	 * @return self
	 */
	public function setUniteage($uniteage): self {
		$this->uniteage = $uniteage;
		return $this;
	}

	/**
	 * 
	 * @return string
	 */
	public function getNumipp() {
		return $this->numipp;
	}
	
	/**
	 * 
	 * @param string $numipp 
	 * @return self
	 */
	public function setNumipp($numipp): self {
		$this->numipp = $numipp;
		return $this;
	}

	/**
	 * 
	 * @return string
	 */
	public function getPrenom() {
		return $this->prenom;
	}
	
	/**
	 * 
	 * @param string $prenom 
	 * @return self
	 */
	public function setPrenom($prenom): self {
		$this->prenom = $prenom;
		return $this;
	}

	/**
	 * 
	 * @return string
	 */
	public function getNom() {
		return $this->nom;
	}
	
	/**
	 * 
	 * @param string $nom 
	 * @return self
	 */
	public function setNom($nom): self {
		$this->nom = $nom;
		return $this;
	}

	/**
	 * 
	 * @return int
	 */
	public function getId() {
		return $this->id;
	}
	
	/**
	 * 
	 * @param int $id 
	 * @return self
	 */
	public function setId($id): self {
		$this->id = $id;
		return $this;
	}


	/**
	 * 
	 * @return boolean
	 */
	public function getHavemammo() {
		return $this->havemammo;
	}
	
	/**
	 * 
	 * @param boolean $havemammo 
	 * @return self
	 */
	public function setHavemammo($havemammo): self {
		$this->havemammo = $havemammo;
		return $this;
	}

	/**
	 * 
	 * @return boolean
	 */
	public function getHaveradio() {
		return $this->haveradio;
	}
	
	/**
	 * 
	 * @param boolean $haveradio 
	 * @return self
	 */
	public function setHaveradio($haveradio): self {
		$this->haveradio = $haveradio;
		return $this;
	}

	/**
	 * 
	 * @return boolean
	 */
	public function getHavescanner() {
		return $this->havescanner;
	}
	
	/**
	 * 
	 * @param boolean $havescanner 
	 * @return self
	 */
	public function setHavescanner($havescanner): self {
		$this->havescanner = $havescanner;
		return $this;
	}

	/**
	 * 
	 * @return \DateTime
	 */
	public function getDatelastexam() {
		return $this->datelastexam;
	}
	
	/**
	 * 
	 * @param \DateTime $datelastexam 
	 * @return self
	 */
	public function setDatelastexam($datelastexam): self {
		$this->datelastexam = $datelastexam;
		return $this;
	}
}

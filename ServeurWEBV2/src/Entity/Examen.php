<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
/**
 * Examen
 * @ApiResource(
 *     collectionOperations={"get"},
 *     itemOperations={"get", "put", "delete"},
 *     paginationEnabled=true,
 *     paginationItemsPerPage= 10,
 *     paginationClientPartial= true
 * )
 * @ORM\Table(name="examen", indexes={@ORM\Index(name="IDX_514C8FECE26C09CA", columns={"salle_examen_id"}), @ORM\Index(name="IDX_514C8FEC6B899279", columns={"patient_id"}), @ORM\Index(name="IDX_514C8FEC98260155", columns={"region_id"})})
 * @ORM\Entity
 */
class Examen
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
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime", nullable=false)
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_cabinet", type="string", length=255, nullable=false)
     */
    private $nomCabinet;

    /**
     * @var string|null
     *
     * @ORM\Column(name="manufacturermodelname", type="string", length=512, nullable=true)
     */
    private $manufacturermodelname;

    /**
     * @var string|null
     *
     * @ORM\Column(name="manufacturer", type="string", length=512, nullable=true)
     */
    private $manufacturer;


     /**
     * @ORM\ManyToOne(targetEntity="Patient")
     * @ORM\JoinColumn(name="id", referencedColumnName="id", nullable=true)
     * */
    
    private $patient;

    /**
     * @var \Region
     *
     * @ORM\ManyToOne(targetEntity="Region")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="region_id", referencedColumnName="id")
     * })
     */
    private $region;

    /**
     * @var \SalleExamen
     *
     * @ORM\ManyToOne(targetEntity="SalleExamen")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="salle_examen_id", referencedColumnName="id")
     * })
     */
    private $salleExamen;
    
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="studydate", type="datetime", nullable=false,options={"default": "2011-11-11 11:11:11"}))
     */
    private $studydate;
    
    
    
    /**
     * @var int
     *
     * @ORM\Column(name="studytime", type="integer", nullable=false)
     */
    private $studytime;
    
    /**
     * @var string|null
     *
     * @ORM\Column(name="studydescription", type="string", length=512, nullable=true)
     */
    private $studydescription;
    
    /**
     * @var string|null
     *
     * @ORM\Column(name="seriesdescription", type="string", length=512, nullable=true)
     */
    private $seriesdescription;


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
	 * @return mixed
	 */
	public function getPatient() {
		return $this->patient;
	}
	
	/**
	 * 
	 * @param mixed $patient 
	 * @return self
	 */
	public function setPatient($patient): self {
		$this->patient = $patient;
		return $this;
	}
}

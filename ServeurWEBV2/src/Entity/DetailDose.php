<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DetailDose
 *
 * @ORM\Table(name="detail_dose", indexes={@ORM\Index(name="IDX_1814643830BD8B0B", columns={"dose_id"})})
 * @ORM\Entity
 */
class DetailDose
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
     * @var float
     *
     * @ORM\Column(name="kvp", type="float", precision=10, scale=0, nullable=false)
     */
    private $kvp;

    /**
     * @var string
     *
     * @ORM\Column(name="modalite", type="string", length=255, nullable=false)
     */
    private $modalite;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime", nullable=false)
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="machine", type="string", length=255, nullable=false)
     */
    private $machine;

    /**
     * @var float
     *
     * @ORM\Column(name="temps_exposition", type="float", precision=10, scale=0, nullable=false)
     */
    private $tempsExposition;

    /**
     * @var float
     *
     * @ORM\Column(name="valeur", type="float", precision=10, scale=0, nullable=false)
     */
    private $valeur;

    /**
     * @var int
     *
     * @ORM\Column(name="xray_tube_content", type="integer", nullable=false)
     */
    private $xrayTubeContent;

    /**
     * @var string
     *
     * @ORM\Column(name="unitexray_tube_content", type="string", length=255, nullable=false)
     */
    private $unitexrayTubeContent;

    /**
     * @var string
     *
     * @ORM\Column(name="body_part", type="string", length=255, nullable=false)
     */
    private $bodyPart;

    /**
     * @var string
     *
     * @ORM\Column(name="unite", type="string", length=255, nullable=false)
     */
    private $unite;

    /**
     * @var string
     *
     * @ORM\Column(name="protocole", type="string", length=255, nullable=false)
     */
    private $protocole;

    /**
     * @var string
     *
     * @ORM\Column(name="body_part_easydose", type="string", length=255, nullable=false)
     */
    private $bodyPartEasydose;

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
     * @var string
     *
     * @ORM\Column(name="uniteseuil", type="string", length=255, nullable=false)
     */
    private $uniteseuil;

    /**
     * @var float
     *
     * @ORM\Column(name="nrdvaleur", type="float", precision=10, scale=0, nullable=false)
     */
    private $nrdvaleur = '0';

    /**
     * @var bool|null
     *
     * @ORM\Column(name="esrhavealerte", type="boolean", nullable=true)
     */
    private $esrhavealerte;

    /**
     * @var string|null
     *
     * @ORM\Column(name="trancheage", type="string", length=255, nullable=true)
     */
    private $trancheage;

    /**
     * @var \Dose
     *
     * @ORM\ManyToOne(targetEntity="Dose")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="dose_id", referencedColumnName="id")
     * })
     */
    private $dose;


    
    /**
     * @var string|null
     *
     * @ORM\Column(name="manufacturer", type="string", length=512, nullable=true)
     */
    private $manufacturer;
    
    
    /**
     * @var string|null
     *
     * @ORM\Column(name="manufacturermodelname", type="string", length=512, nullable=true)
     */
    private $manufacturermodelname;
    
    
    /**
     * @var string|null
     *
     * @ORM\Column(name="radiationsetting", type="string", length=512, nullable=true)
     */
    private $radiationsetting;
    
    /**
     * @var string|null
     *
     * @ORM\Column(name="radiationmode", type="string", length=512, nullable=true)
     */
    private $radiationmode;
    
    
    /**
     * @var float
     *
     * @ORM\Column(name="imageandfluoroscopyareadoseproduct", type="float", precision=10, scale=0, nullable=false)
     */
    #private $imageandfluoroscopyareadoseproduct ;
    
    
    /**
     * @var int
     *
     * @ORM\Column(name="xray_tube_contentinua", type="integer", nullable=false)
     */
    private $xrayTubeContentinua;
}

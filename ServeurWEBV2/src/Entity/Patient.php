<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Patient
 *
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


}

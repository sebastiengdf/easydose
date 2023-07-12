<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * StatTopFive
 *
 * @ORM\Table(name="stat_top_five")
 * @ORM\Entity
 */
class StatTopFive
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
     * @ORM\Column(name="bodypart", type="string", length=512, nullable=false)
     */
    private $bodypart;

    /**
     * @var float
     *
     * @ORM\Column(name="difference", type="float", precision=10, scale=0, nullable=false)
     */
    private $difference;

    /**
     * @var float
     *
     * @ORM\Column(name="valeur", type="float", precision=10, scale=0, nullable=false)
     */
    private $valeur;

    /**
     * @var string
     *
     * @ORM\Column(name="unite", type="string", length=255, nullable=false)
     */
    private $unite;

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
    private $nrdvaleur;

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
     * @ORM\Column(name="sex", type="string", length=255, nullable=false)
     */
    private $sex;

    /**
     * @var int
     *
     * @ORM\Column(name="age", type="integer", nullable=false)
     */
    private $age;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime", nullable=false)
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="modalite", type="string", length=255, nullable=false)
     */
    private $modalite;

    /**
     * @var int
     *
     * @ORM\Column(name="patientid", type="integer", nullable=false)
     */
    private $patientid;


}

<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Dose
 *
 * @ORM\Table(name="dose")
 * @ORM\Entity
 */
class Dose
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
     * @ORM\Column(name="valeur", type="float", precision=10, scale=0, nullable=false)
     */
    private $valeur;

    /**
     * @var string
     *
     * @ORM\Column(name="modalite", type="string", length=255, nullable=false)
     */
    private $modalite;

    /**
     * @var string
     *
     * @ORM\Column(name="unite", type="string", length=255, nullable=false)
     */
    private $unite;

    /**
     * @var float
     *
     * @ORM\Column(name="kvp", type="float", precision=10, scale=0, nullable=false)
     */
    private $kvp;

    /**
     * @var float
     *
     * @ORM\Column(name="temps_exposition", type="float", precision=10, scale=0, nullable=false)
     */
    private $tempsExposition;

    /**
     * @var int
     *
     * @ORM\Column(name="xray_tube_current", type="integer", nullable=false)
     */
    private $xrayTubeCurrent;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime", nullable=false)
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="protocole", type="string", length=255, nullable=false)
     */
    private $protocole;


}

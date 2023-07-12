<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Nrd
 *
 * @ORM\Table(name="nrd")
 * @ORM\Entity
 */
class Nrd
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
     * @ORM\Column(name="type", type="string", length=255, nullable=false)
     */
    private $type;

    /**
     * @var float
     *
     * @ORM\Column(name="poids", type="float", precision=10, scale=0, nullable=false)
     */
    private $poids;

    /**
     * @var string
     *
     * @ORM\Column(name="bodypart", type="string", length=255, nullable=false)
     */
    private $bodypart;

    /**
     * @var string
     *
     * @ORM\Column(name="age", type="string", length=255, nullable=false)
     */
    private $age;

    /**
     * @var string
     *
     * @ORM\Column(name="orientation", type="string", length=255, nullable=false)
     */
    private $orientation;

    /**
     * @var float
     *
     * @ORM\Column(name="valeur", type="float", precision=10, scale=0, nullable=false)
     */
    private $valeur;

    /**
     * @var string
     *
     * @ORM\Column(name="protocole", type="string", length=255, nullable=false)
     */
    private $protocole;


}

<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Optimisationdose
 *
 * @ORM\Table(name="optimisationdose")
 * @ORM\Entity
 */
class Optimisationdose
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
     * @ORM\Column(name="protocole", type="string", length=512, nullable=false)
     */
    private $protocole;

    /**
     * @var float
     *
     * @ORM\Column(name="kvp", type="float", precision=10, scale=0, nullable=false)
     */
    private $kvp;

    /**
     * @var float
     *
     * @ORM\Column(name="xraytubecurrent", type="float", precision=10, scale=0, nullable=false)
     */
    private $xraytubecurrent;

    /**
     * @var string
     *
     * @ORM\Column(name="modalite", type="string", length=512, nullable=false)
     */
    private $modalite;

    /**
     * @var string
     *
     * @ORM\Column(name="machine", type="string", length=255, nullable=false)
     */
    private $machine;

    /**
     * @var string
     *
     * @ORM\Column(name="commentaire", type="string", length=512, nullable=false)
     */
    private $commentaire;

    /**
     * @var float
     *
     * @ORM\Column(name="valeur", type="float", precision=10, scale=0, nullable=false)
     */
    private $valeur;


}

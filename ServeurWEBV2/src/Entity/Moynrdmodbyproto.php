<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Moynrdmodbyproto
 *
 * @ORM\Table(name="moynrdmodbyproto")
 * @ORM\Entity
 */
class Moynrdmodbyproto
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
     * @ORM\Column(name="protocole", type="string", length=255, nullable=false)
     */
    private $protocole;

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
     * @var float
     *
     * @ORM\Column(name="nrd", type="float", precision=10, scale=0, nullable=false)
     */
    private $nrd;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255, nullable=false)
     */
    private $type;


}

<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * StatProtocoles
 *
 * @ORM\Table(name="stat_protocoles")
 * @ORM\Entity
 */
class StatProtocoles
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
     * @var int
     *
     * @ORM\Column(name="nbbodypart", type="integer", nullable=false)
     */
    private $nbbodypart;

    /**
     * @var string
     *
     * @ORM\Column(name="protocole", type="string", length=512, nullable=false)
     */
    private $protocole;

    /**
     * @var string
     *
     * @ORM\Column(name="unite", type="string", length=255, nullable=false)
     */
    private $unite;

    /**
     * @var string
     *
     * @ORM\Column(name="modalite", type="string", length=255, nullable=false)
     */
    private $modalite;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255, nullable=false)
     */
    private $type;


}

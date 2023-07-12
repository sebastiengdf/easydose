<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Optimisationdosedetail
 *
 * @ORM\Table(name="optimisationdosedetail", indexes={@ORM\Index(name="IDX_3C95FBB868E4EAD9", columns={"optimisationdose_id"})})
 * @ORM\Entity
 */
class Optimisationdosedetail
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
     * @var int|null
     *
     * @ORM\Column(name="nbnotesmax", type="integer", nullable=true)
     */
    private $nbnotesmax = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="machine", type="string", length=255, nullable=false)
     */
    private $machine;

    /**
     * @var \Optimisationdose
     *
     * @ORM\ManyToOne(targetEntity="Optimisationdose")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="optimisationdose_id", referencedColumnName="id")
     * })
     */
    private $optimisationdose;


}

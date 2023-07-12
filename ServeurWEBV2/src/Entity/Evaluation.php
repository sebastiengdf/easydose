<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Evaluation
 *
 * @ORM\Table(name="evaluation", indexes={@ORM\Index(name="IDX_1323A575DA213519", columns={"optimisationdosedetail_id"})})
 * @ORM\Entity
 */
class Evaluation
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
     * @var int
     *
     * @ORM\Column(name="valeur", type="integer", nullable=false)
     */
    private $valeur;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime", nullable=false)
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="contenu", type="string", length=500, nullable=false)
     */
    private $contenu;

    /**
     * @var \Optimisationdosedetail
     *
     * @ORM\ManyToOne(targetEntity="Optimisationdosedetail")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="optimisationdosedetail_id", referencedColumnName="id")
     * })
     */
    private $optimisationdosedetail;


}

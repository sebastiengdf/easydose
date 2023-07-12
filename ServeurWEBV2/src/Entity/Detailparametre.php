<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Detailparametre
 *
 * @ORM\Table(name="detailparametre", indexes={@ORM\Index(name="IDX_74D93CFAACC79041", columns={"parametre"})})
 * @ORM\Entity
 */
class Detailparametre
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
     * @ORM\Column(name="valeur", type="string", length=255, nullable=false)
     */
    private $valeur;

    /**
     * @var \Parametre
     *
     * @ORM\ManyToOne(targetEntity="Parametre")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="parametre", referencedColumnName="id")
     * })
     */
    private $parametre;


}

<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Dispositif
 *
 * @ORM\Table(name="dispositif")
 * @ORM\Entity
 */
class Dispositif
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
     * @var string|null
     *
     * @ORM\Column(name="denomination", type="string", length=255, nullable=true)
     */
    private $denomination;

    /**
     * @var string|null
     *
     * @ORM\Column(name="num_salle", type="string", length=255, nullable=true)
     */
    private $numSalle;

    /**
     * @var string|null
     *
     * @ORM\Column(name="num_serie", type="string", length=512, nullable=true)
     */
    private $numSerie;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="datemiseenservice", type="datetime", nullable=true)
     */
    private $datemiseenservice;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=255, nullable=false)
     */
    private $image;

    /**
     * @var string|null
     *
     * @ORM\Column(name="marque", type="string", length=512, nullable=true)
     */
    private $marque;


}

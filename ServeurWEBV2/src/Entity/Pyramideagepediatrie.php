<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pyramideagepediatrie
 *
 * @ORM\Table(name="Pyramideagepediatrie")
 * @ORM\Entity
 */
class Pyramideagepediatrie
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
     * @ORM\Column(name="genre", type="string", length=255, nullable=false)
     */
    private $genre;

    /**
     * @var string
     *
     * @ORM\Column(name="tranche_age", type="string", length=255, nullable=false)
     */
    private $trancheAge;

    /**
     * @var int
     *
     * @ORM\Column(name="nombre", type="integer", nullable=false)
     */
    private $nombre;

    /**
     * @var int
     *
     * @ORM\Column(name="ordre", type="integer", nullable=false)
     */
    private $ordre;


}

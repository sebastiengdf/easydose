<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Conversion
 *
 * @ORM\Table(name="conversion")
 * @ORM\Entity
 */
class Conversion
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
     * @ORM\Column(name="unitesource", type="string", length=255, nullable=false)
     */
    private $unitesource;

    /**
     * @var string
     *
     * @ORM\Column(name="unitecible", type="string", length=255, nullable=false)
     */
    private $unitecible;

    /**
     * @var float
     *
     * @ORM\Column(name="facteur", type="float", precision=10, scale=0, nullable=false)
     */
    private $facteur;


}

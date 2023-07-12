<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ConversionAgePoids
 *
 * @ORM\Table(name="conversion_age_poids")
 * @ORM\Entity
 */
class ConversionAgePoids
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
     * @ORM\Column(name="age", type="integer", nullable=false)
     */
    private $age;

    /**
     * @var float
     *
     * @ORM\Column(name="poids", type="float", precision=10, scale=0, nullable=false)
     */
    private $poids;

    /**
     * @var string
     *
     * @ORM\Column(name="typeage", type="string", length=255, nullable=false)
     */
    private $typeage;


}

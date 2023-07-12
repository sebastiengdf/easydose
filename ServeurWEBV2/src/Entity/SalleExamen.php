<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SalleExamen
 *
 * @ORM\Table(name="salle_examen")
 * @ORM\Entity
 */
class SalleExamen
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


}

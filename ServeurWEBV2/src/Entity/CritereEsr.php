<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CritereEsr
 *
 * @ORM\Table(name="critere_esr")
 * @ORM\Entity
 */
class CritereEsr
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
     * @ORM\Column(name="libelle", type="string", length=512, nullable=false)
     */
    private $libelle;


}

<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TypePersonnalEvent
 *
 * @ORM\Table(name="type_personnal_event")
 * @ORM\Entity
 */
class TypePersonnalEvent
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
     * @ORM\Column(name="libelle", type="string", length=255, nullable=false)
     */
    private $libelle;


}

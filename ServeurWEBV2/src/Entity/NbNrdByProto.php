<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * NbNrdByProto
 *
 * @ORM\Table(name="nb_nrd_by_proto")
 * @ORM\Entity
 */
class NbNrdByProto
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
     * @var string
     *
     * @ORM\Column(name="modalite", type="string", length=512, nullable=false)
     */
    private $modalite;

    /**
     * @var int
     *
     * @ORM\Column(name="nombre", type="integer", nullable=false)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=512, nullable=false)
     */
    private $type;


}

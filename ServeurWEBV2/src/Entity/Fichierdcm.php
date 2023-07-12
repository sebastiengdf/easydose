<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Fichierdcm
 *
 * @ORM\Table(name="fichierdcm")
 * @ORM\Entity
 */
class Fichierdcm
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
     * @ORM\Column(name="contenu", type="string", length=512, nullable=true)
     */
    private $contenu;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="date", type="datetime", nullable=true)
     */
    private $date;

    /**
     * @var bool
     *
     * @ORM\Column(name="replay", type="boolean", nullable=false)
     */
    private $replay;

    /**
     * @var bool
     *
     * @ORM\Column(name="replayed", type="boolean", nullable=false)
     */
    private $replayed;

    /**
     * @var string|null
     *
     * @ORM\Column(name="traceback", type="string", length=1024, nullable=true)
     */
    private $traceback;

    /**
     * @var int
     *
     * @ORM\Column(name="result", type="integer", nullable=false)
     */
    private $result;


}

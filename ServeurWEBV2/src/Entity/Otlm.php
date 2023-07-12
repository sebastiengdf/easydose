<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Otlm
 *
 * @ORM\Table(name="otlm")
 * @ORM\Entity
 */
class Otlm
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
     * @ORM\Column(name="obj", type="string", length=255, nullable=false)
     */
    private $obj;

    /**
     * @var string
     *
     * @ORM\Column(name="msg", type="string", length=255, nullable=false)
     */
    private $msg;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255, nullable=false)
     */
    private $type;


}

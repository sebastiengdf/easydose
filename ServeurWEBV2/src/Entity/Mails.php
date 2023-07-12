<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Mails
 *
 * @ORM\Table(name="mails")
 * @ORM\Entity
 */
class Mails
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
     * @ORM\Column(name="msg", type="string", length=1024, nullable=false)
     */
    private $msg;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255, nullable=false)
     */
    private $type;

    /**
     * @var int
     *
     * @ORM\Column(name="dicomfile", type="integer", nullable=false)
     */
    private $dicomfile;


}

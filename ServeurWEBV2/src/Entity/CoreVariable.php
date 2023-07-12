<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CoreVariable
 *
 * @ORM\Table(name="core_variable")
 * @ORM\Entity
 */
class CoreVariable
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
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="value", type="text", length=0, nullable=false)
     */
    private $value;

    /**
     * @var string|null
     *
     * @ORM\Column(name="content", type="text", length=0, nullable=true)
     */
    private $content;


}

<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TrancheAge
 *
 * @ORM\Table(name="tranche_age")
 * @ORM\Entity
 */
class TrancheAge
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
     * @ORM\Column(name="valmin", type="integer", nullable=false)
     */
    private $valmin;

    /**
     * @var string
     *
     * @ORM\Column(name="unitemin", type="string", length=255, nullable=false)
     */
    private $unitemin;

    /**
     * @var int
     *
     * @ORM\Column(name="valmax", type="integer", nullable=false)
     */
    private $valmax;

    /**
     * @var string
     *
     * @ORM\Column(name="unitemax", type="string", length=255, nullable=false)
     */
    private $unitemax;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255, nullable=false)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="tranche", type="string", length=255, nullable=false)
     */
    private $tranche;


}

<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * StatsvolumeMois
 *
 * @ORM\Table(name="statsvolume_mois")
 * @ORM\Entity
 */
class StatsvolumeMois
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
     * @ORM\Column(name="mois", type="string", length=255, nullable=false)
     */
    private $mois;

    /**
     * @var int
     *
     * @ORM\Column(name="cnt", type="integer", nullable=false)
     */
    private $cnt;


}

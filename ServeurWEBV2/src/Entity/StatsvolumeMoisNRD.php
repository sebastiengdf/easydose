<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * StatsvolumeMoisNRD
 *
 * @ORM\Table(name="statsvolume_mois_n_r_d")
 * @ORM\Entity
 */
class StatsvolumeMoisNRD
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

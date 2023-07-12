<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RegionDose
 *
 * @ORM\Table(name="region_dose", indexes={@ORM\Index(name="IDX_36E79B8098260155", columns={"region_id"}), @ORM\Index(name="IDX_36E79B8030BD8B0B", columns={"dose_id"})})
 * @ORM\Entity
 */
class RegionDose
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
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime", nullable=false)
     */
    private $date;

    /**
     * @var \Dose
     *
     * @ORM\ManyToOne(targetEntity="Dose")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="dose_id", referencedColumnName="id")
     * })
     */
    private $dose;

    /**
     * @var \Region
     *
     * @ORM\ManyToOne(targetEntity="Region")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="region_id", referencedColumnName="id")
     * })
     */
    private $region;


}

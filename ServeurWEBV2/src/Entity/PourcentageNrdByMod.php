<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PourcentageNrdByMod
 *
 * @ORM\Table(name="pourcentage_nrd_by_mod")
 * @ORM\Entity
 */
class PourcentageNrdByMod
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
     * @ORM\Column(name="modalite", type="string", length=512, nullable=false)
     */
    private $modalite;

    /**
     * @var int
     *
     * @ORM\Column(name="nbalert", type="integer", nullable=false)
     */
    private $nbalert;

    /**
     * @var int
     *
     * @ORM\Column(name="totalexam", type="integer", nullable=false)
     */
    private $totalexam;

    /**
     * @var float
     *
     * @ORM\Column(name="pourcentage", type="float", precision=10, scale=0, nullable=false)
     */
    private $pourcentage;

    /**
     * @var string
     *
     * @ORM\Column(name="trancheage", type="string", length=512, nullable=false)
     */
    private $trancheage;


}

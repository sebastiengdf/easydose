<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Epingle
 *
 * @ORM\Table(name="epingle", indexes={@ORM\Index(name="IDX_B9134828FAD8DA84", columns={"createur"}), @ORM\Index(name="IDX_B91348286B899279", columns={"patient_id"})})
 * @ORM\Entity
 */
class Epingle
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
     * @var \Patient
     *
     * @ORM\ManyToOne(targetEntity="Patient")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="patient_id", referencedColumnName="id")
     * })
     */
    private $patient;

    /**
     * @var \UserUser
     *
     * @ORM\ManyToOne(targetEntity="UserUser")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="createur", referencedColumnName="id")
     * })
     */
    private $createur;


}

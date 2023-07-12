<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UserAction
 *
 * @ORM\Table(name="user_action", indexes={@ORM\Index(name="IDX_229E97AFFAD8DA84", columns={"createur"})})
 * @ORM\Entity
 */
class UserAction
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
     * @ORM\Column(name="page", type="string", length=255, nullable=false)
     */
    private $page;

    /**
     * @var string|null
     *
     * @ORM\Column(name="action", type="string", length=255, nullable=true)
     */
    private $action;

    /**
     * @var string|null
     *
     * @ORM\Column(name="parameter1", type="string", length=255, nullable=true)
     */
    private $parameter1;

    /**
     * @var string|null
     *
     * @ORM\Column(name="parameter2", type="string", length=255, nullable=true)
     */
    private $parameter2;

    /**
     * @var string|null
     *
     * @ORM\Column(name="parameter3", type="string", length=255, nullable=true)
     */
    private $parameter3;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255, nullable=false)
     */
    private $type;

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

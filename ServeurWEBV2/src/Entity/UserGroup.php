<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UserGroup
 *
 * @ORM\Table(name="user_group", uniqueConstraints={@ORM\UniqueConstraint(name="UNIQ_8F02BF9D86383B10", columns={"avatar_id"}), @ORM\UniqueConstraint(name="UNIQ_8F02BF9D5E237E06", columns={"name"})})
 * @ORM\Entity
 */
class UserGroup
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
     * @ORM\Column(name="name", type="string", length=180, nullable=false)
     */
    private $name;

    /**
     * @var array
     *
     * @ORM\Column(name="roles", type="array", length=0, nullable=false)
     */
    private $roles;

    /**
     * @var string|null
     *
     * @ORM\Column(name="color", type="string", length=255, nullable=true)
     */
    private $color;

    /**
     * @var \CoreImage
     *
     * @ORM\ManyToOne(targetEntity="CoreImage")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="avatar_id", referencedColumnName="id")
     * })
     */
    private $avatar;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="CmsPage", mappedBy="groupe")
     */
    private $page;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="CmsPost", mappedBy="groupe")
     */
    private $post;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="CmsTaxonomy", mappedBy="groupe")
     */
    private $taxonomy;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="UserUser", mappedBy="group")
     */
    private $user;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->page = new \Doctrine\Common\Collections\ArrayCollection();
        $this->post = new \Doctrine\Common\Collections\ArrayCollection();
        $this->taxonomy = new \Doctrine\Common\Collections\ArrayCollection();
        $this->user = new \Doctrine\Common\Collections\ArrayCollection();
    }

}

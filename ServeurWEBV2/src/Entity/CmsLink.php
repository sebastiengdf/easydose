<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CmsLink
 *
 * @ORM\Table(name="cms_link", uniqueConstraints={@ORM\UniqueConstraint(name="UNIQ_F13A348C989D9B62", columns={"slug"})}, indexes={@ORM\Index(name="IDX_F13A348C727ACA70", columns={"parent_id"}), @ORM\Index(name="IDX_F13A348C140AB620", columns={"page"})})
 * @ORM\Entity
 */
class CmsLink
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
     * @var string|null
     *
     * @ORM\Column(name="link_type", type="string", length=255, nullable=true)
     */
    private $linkType;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="external", type="boolean", nullable=true)
     */
    private $external;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="root_link", type="boolean", nullable=true)
     */
    private $rootLink;

    /**
     * @var string|null
     *
     * @ORM\Column(name="link", type="text", length=0, nullable=true)
     */
    private $link;

    /**
     * @var string|null
     *
     * @ORM\Column(name="route_name", type="text", length=0, nullable=true)
     */
    private $routeName;

    /**
     * @var int
     *
     * @ORM\Column(name="lft", type="integer", nullable=false)
     */
    private $lft;

    /**
     * @var int
     *
     * @ORM\Column(name="lvl", type="integer", nullable=false)
     */
    private $lvl;

    /**
     * @var int
     *
     * @ORM\Column(name="rgt", type="integer", nullable=false)
     */
    private $rgt;

    /**
     * @var int|null
     *
     * @ORM\Column(name="root", type="integer", nullable=true)
     */
    private $root;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="created", type="datetime", nullable=true)
     */
    private $created;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="updated", type="datetime", nullable=true)
     */
    private $updated;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    private $name;

    /**
     * @var string|null
     *
     * @ORM\Column(name="slug", type="string", length=255, nullable=true)
     */
    private $slug;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="published", type="boolean", nullable=true)
     */
    private $published;

    /**
     * @var int|null
     *
     * @ORM\Column(name="position", type="integer", nullable=true)
     */
    private $position;

    /**
     * @var \CmsPage
     *
     * @ORM\ManyToOne(targetEntity="CmsPage")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="page", referencedColumnName="id")
     * })
     */
    private $page;

    /**
     * @var \CmsLink
     *
     * @ORM\ManyToOne(targetEntity="CmsLink")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="parent_id", referencedColumnName="id")
     * })
     */
    private $parent;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="CoreAttribute", inversedBy="link")
     * @ORM\JoinTable(name="cms_link_children_attribute",
     *   joinColumns={
     *     @ORM\JoinColumn(name="link", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="children_attribute", referencedColumnName="id")
     *   }
     * )
     */
    private $childrenAttribute;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="CmsAttribute", inversedBy="link")
     * @ORM\JoinTable(name="cms_link_route_args",
     *   joinColumns={
     *     @ORM\JoinColumn(name="link", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="route_arg", referencedColumnName="id")
     *   }
     * )
     */
    private $routeArg;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->childrenAttribute = new \Doctrine\Common\Collections\ArrayCollection();
        $this->routeArg = new \Doctrine\Common\Collections\ArrayCollection();
    }

}

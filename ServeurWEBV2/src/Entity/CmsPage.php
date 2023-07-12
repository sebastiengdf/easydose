<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CmsPage
 *
 * @ORM\Table(name="cms_page", uniqueConstraints={@ORM\UniqueConstraint(name="UNIQ_D39C1B5D5E15A06E", columns={"unique_slug"}), @ORM\UniqueConstraint(name="UNIQ_D39C1B5D989D9B62", columns={"slug"})}, indexes={@ORM\Index(name="IDX_D39C1B5D8C22AA1A", columns={"layout_id"}), @ORM\Index(name="IDX_D39C1B5D162CB942", columns={"folder_id"})})
 * @ORM\Entity
 */
class CmsPage
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
     * @ORM\Column(name="url", type="string", length=255, nullable=true)
     */
    private $url;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="show_builder", type="boolean", nullable=true)
     */
    private $showBuilder;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="private_access", type="boolean", nullable=true)
     */
    private $privateAccess;

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
     * @var string|null
     *
     * @ORM\Column(name="unique_slug", type="string", length=255, nullable=true)
     */
    private $uniqueSlug;

    /**
     * @var string|null
     *
     * @ORM\Column(name="content", type="text", length=0, nullable=true)
     */
    private $content;

    /**
     * @var string|null
     *
     * @ORM\Column(name="excerpt", type="text", length=0, nullable=true)
     */
    private $excerpt;

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
     * @var bool|null
     *
     * @ORM\Column(name="published", type="boolean", nullable=true)
     */
    private $published;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="published_start", type="datetime", nullable=true)
     */
    private $publishedStart;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="published_end", type="datetime", nullable=true)
     */
    private $publishedEnd;

    /**
     * @var string|null
     *
     * @ORM\Column(name="title", type="string", length=255, nullable=true)
     */
    private $title;

    /**
     * @var string|null
     *
     * @ORM\Column(name="h1", type="string", length=255, nullable=true)
     */
    private $h1;

    /**
     * @var string|null
     *
     * @ORM\Column(name="meta_description", type="text", length=0, nullable=true)
     */
    private $metaDescription;

    /**
     * @var string|null
     *
     * @ORM\Column(name="meta_keyword", type="text", length=0, nullable=true)
     */
    private $metaKeyword;

    /**
     * @var string|null
     *
     * @ORM\Column(name="other_meta", type="text", length=0, nullable=true)
     */
    private $otherMeta;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="no_index", type="boolean", nullable=true)
     */
    private $noIndex;

    /**
     * @var string|null
     *
     * @ORM\Column(name="stylesheets", type="text", length=0, nullable=true)
     */
    private $stylesheets;

    /**
     * @var string|null
     *
     * @ORM\Column(name="javascripts", type="text", length=0, nullable=true)
     */
    private $javascripts;

    /**
     * @var int|null
     *
     * @ORM\Column(name="count", type="integer", nullable=true)
     */
    private $count;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="cache", type="boolean", nullable=true)
     */
    private $cache;

    /**
     * @var string|null
     *
     * @ORM\Column(name="etag", type="string", length=255, nullable=true)
     */
    private $etag;

    /**
     * @var int|null
     *
     * @ORM\Column(name="cache_time", type="integer", nullable=true)
     */
    private $cacheTime;

    /**
     * @var \CmsFolder
     *
     * @ORM\ManyToOne(targetEntity="CmsFolder")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="folder_id", referencedColumnName="id")
     * })
     */
    private $folder;

    /**
     * @var \CmsLayout
     *
     * @ORM\ManyToOne(targetEntity="CmsLayout")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="layout_id", referencedColumnName="id")
     * })
     */
    private $layout;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="UserGroup", inversedBy="page")
     * @ORM\JoinTable(name="cms_page_groupe",
     *   joinColumns={
     *     @ORM\JoinColumn(name="page", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="groupe", referencedColumnName="id")
     *   }
     * )
     */
    private $groupe;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->groupe = new \Doctrine\Common\Collections\ArrayCollection();
    }

}

<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CmsPost
 *
 * @ORM\Table(name="cms_post", uniqueConstraints={@ORM\UniqueConstraint(name="UNIQ_9D1CC1F0989D9B62", columns={"slug"}), @ORM\UniqueConstraint(name="UNIQ_9D1CC1F05E15A06E", columns={"unique_slug"})}, indexes={@ORM\Index(name="IDX_9D1CC1F08C22AA1A", columns={"layout_id"}), @ORM\Index(name="IDX_9D1CC1F08D93D649", columns={"user"}), @ORM\Index(name="IDX_9D1CC1F08D0886C5", columns={"cover"})})
 * @ORM\Entity
 */
class CmsPost
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
     * @var bool|null
     *
     * @ORM\Column(name="private_access", type="boolean", nullable=true)
     */
    private $privateAccess;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="top", type="boolean", nullable=true)
     */
    private $top;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="enable_comment", type="boolean", nullable=true)
     */
    private $enableComment;

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
     * @ORM\Column(name="excerpt", type="text", length=0, nullable=true)
     */
    private $excerpt;

    /**
     * @var string|null
     *
     * @ORM\Column(name="content", type="text", length=0, nullable=true)
     */
    private $content;

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
     * @var string|null
     *
     * @ORM\Column(name="author", type="text", length=0, nullable=true)
     */
    private $author;

    /**
     * @var int|null
     *
     * @ORM\Column(name="position", type="integer", nullable=true)
     */
    private $position;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255, nullable=false)
     */
    private $type;

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
     * @var \MediaMedia
     *
     * @ORM\ManyToOne(targetEntity="MediaMedia")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cover", referencedColumnName="id")
     * })
     */
    private $cover;

    /**
     * @var \UserUser
     *
     * @ORM\ManyToOne(targetEntity="UserUser")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user", referencedColumnName="id")
     * })
     */
    private $user;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="UserGroup", inversedBy="post")
     * @ORM\JoinTable(name="cms_post_groupe",
     *   joinColumns={
     *     @ORM\JoinColumn(name="post", referencedColumnName="id")
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

<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CmsArticle
 *
 * @ORM\Table(name="cms_article", indexes={@ORM\Index(name="IDX_5CD6017764C19C1", columns={"category"})})
 * @ORM\Entity
 */
class CmsArticle
{
    /**
     * @var \CmsArticleCategory
     *
     * @ORM\ManyToOne(targetEntity="CmsArticleCategory")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="category", referencedColumnName="id")
     * })
     */
    private $category;

    /**
     * @var \CmsPost
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="CmsPost")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id", referencedColumnName="id")
     * })
     */
    private $id;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="CmsArticleTag", inversedBy="post")
     * @ORM\JoinTable(name="cms_article_article_tags",
     *   joinColumns={
     *     @ORM\JoinColumn(name="post", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="tag", referencedColumnName="id")
     *   }
     * )
     */
    private $tag;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->tag = new \Doctrine\Common\Collections\ArrayCollection();
    }

}

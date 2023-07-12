<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CmsArticleTag
 *
 * @ORM\Table(name="cms_article_tag")
 * @ORM\Entity
 */
class CmsArticleTag
{
    /**
     * @var \CmsTaxonomy
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="CmsTaxonomy")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id", referencedColumnName="id")
     * })
     */
    private $id;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="CmsArticle", mappedBy="tag")
     */
    private $post;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->post = new \Doctrine\Common\Collections\ArrayCollection();
    }

}

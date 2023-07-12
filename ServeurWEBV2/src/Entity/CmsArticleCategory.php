<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CmsArticleCategory
 *
 * @ORM\Table(name="cms_article_category")
 * @ORM\Entity
 */
class CmsArticleCategory
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


}

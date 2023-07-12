<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CmsField
 *
 * @ORM\Table(name="cms_field", indexes={@ORM\Index(name="IDX_7586DE7423A0E66", columns={"article"})})
 * @ORM\Entity
 */
class CmsField
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
     * @ORM\Column(name="name", type="string", length=255, nullable=true)
     */
    private $name;

    /**
     * @var string|null
     *
     * @ORM\Column(name="value", type="text", length=0, nullable=true)
     */
    private $value;

    /**
     * @var int|null
     *
     * @ORM\Column(name="position", type="integer", nullable=true)
     */
    private $position;

    /**
     * @var \CmsPost
     *
     * @ORM\ManyToOne(targetEntity="CmsPost")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="article", referencedColumnName="id")
     * })
     */
    private $article;


}

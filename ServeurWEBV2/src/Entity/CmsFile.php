<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CmsFile
 *
 * @ORM\Table(name="cms_file", indexes={@ORM\Index(name="IDX_4B099B6D23A0E66", columns={"article"}), @ORM\Index(name="IDX_4B099B6D6A2CA10C", columns={"media"})})
 * @ORM\Entity
 */
class CmsFile
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

    /**
     * @var \MediaMedia
     *
     * @ORM\ManyToOne(targetEntity="MediaMedia")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="media", referencedColumnName="id")
     * })
     */
    private $media;


}

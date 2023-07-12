<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CmsPicture
 *
 * @ORM\Table(name="cms_picture", indexes={@ORM\Index(name="IDX_483740985A8A6C8D", columns={"post"}), @ORM\Index(name="IDX_483740986A2CA10C", columns={"media"})})
 * @ORM\Entity
 */
class CmsPicture
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
     *   @ORM\JoinColumn(name="post", referencedColumnName="id")
     * })
     */
    private $post;

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

<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MediaGalleryMedia
 *
 * @ORM\Table(name="media__gallery_media", indexes={@ORM\Index(name="IDX_80D4C541EA9FDD75", columns={"media_id"}), @ORM\Index(name="IDX_80D4C5414E7AF8F", columns={"gallery_id"})})
 * @ORM\Entity
 */
class MediaGalleryMedia
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
     * @var int
     *
     * @ORM\Column(name="position", type="integer", nullable=false)
     */
    private $position;

    /**
     * @var bool
     *
     * @ORM\Column(name="enabled", type="boolean", nullable=false)
     */
    private $enabled;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated_at", type="datetime", nullable=false)
     */
    private $updatedAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=false)
     */
    private $createdAt;

    /**
     * @var \MediaGallery
     *
     * @ORM\ManyToOne(targetEntity="MediaGallery")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="gallery_id", referencedColumnName="id")
     * })
     */
    private $gallery;

    /**
     * @var \MediaMedia
     *
     * @ORM\ManyToOne(targetEntity="MediaMedia")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="media_id", referencedColumnName="id")
     * })
     */
    private $media;


}

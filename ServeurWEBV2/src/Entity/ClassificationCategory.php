<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ClassificationCategory
 *
 * @ORM\Table(name="classification__category", indexes={@ORM\Index(name="IDX_43629B36E25D857E", columns={"context"}), @ORM\Index(name="IDX_43629B36727ACA70", columns={"parent_id"}), @ORM\Index(name="IDX_43629B36EA9FDD75", columns={"media_id"})})
 * @ORM\Entity
 */
class ClassificationCategory
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
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    private $name;

    /**
     * @var bool
     *
     * @ORM\Column(name="enabled", type="boolean", nullable=false)
     */
    private $enabled;

    /**
     * @var string
     *
     * @ORM\Column(name="slug", type="string", length=255, nullable=false)
     */
    private $slug;

    /**
     * @var string|null
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @var int|null
     *
     * @ORM\Column(name="position", type="integer", nullable=true)
     */
    private $position;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=false)
     */
    private $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated_at", type="datetime", nullable=false)
     */
    private $updatedAt;

    /**
     * @var \ClassificationCategory
     *
     * @ORM\ManyToOne(targetEntity="ClassificationCategory")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="parent_id", referencedColumnName="id")
     * })
     */
    private $parent;

    /**
     * @var \ClassificationContext
     *
     * @ORM\ManyToOne(targetEntity="ClassificationContext")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="context", referencedColumnName="id")
     * })
     */
    private $context;

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

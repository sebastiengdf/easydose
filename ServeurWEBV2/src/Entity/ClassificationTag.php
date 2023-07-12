<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ClassificationTag
 *
 * @ORM\Table(name="classification__tag", uniqueConstraints={@ORM\UniqueConstraint(name="tag_context", columns={"slug", "context"})}, indexes={@ORM\Index(name="IDX_CA57A1C7E25D857E", columns={"context"})})
 * @ORM\Entity
 */
class ClassificationTag
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
     * @var \ClassificationContext
     *
     * @ORM\ManyToOne(targetEntity="ClassificationContext")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="context", referencedColumnName="id")
     * })
     */
    private $context;


}

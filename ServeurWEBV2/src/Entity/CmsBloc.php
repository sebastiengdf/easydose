<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CmsBloc
 *
 * @ORM\Table(name="cms_bloc", uniqueConstraints={@ORM\UniqueConstraint(name="UNIQ_EE38275E15A06E", columns={"unique_slug"})})
 * @ORM\Entity
 */
class CmsBloc
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
     * @var string|null
     *
     * @ORM\Column(name="unique_slug", type="string", length=255, nullable=true)
     */
    private $uniqueSlug;

    /**
     * @var string|null
     *
     * @ORM\Column(name="content", type="text", length=0, nullable=true)
     */
    private $content;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="published", type="boolean", nullable=true)
     */
    private $published;

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


}

<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CmsMenu
 *
 * @ORM\Table(name="cms_menu", uniqueConstraints={@ORM\UniqueConstraint(name="UNIQ_BA9397EE717120C6", columns={"root_link"}), @ORM\UniqueConstraint(name="UNIQ_BA9397EE5E15A06E", columns={"unique_slug"})}, indexes={@ORM\Index(name="IDX_BA9397EE4491A767", columns={"menu_type"})})
 * @ORM\Entity
 */
class CmsMenu
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
     * @var \DateTime|null
     *
     * @ORM\Column(name="created", type="datetime", nullable=true)
     */
    private $created;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="updated", type="datetime", nullable=true)
     */
    private $updated;

    /**
     * @var \CmsMenuType
     *
     * @ORM\ManyToOne(targetEntity="CmsMenuType")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="menu_type", referencedColumnName="id")
     * })
     */
    private $menuType;

    /**
     * @var \CmsLink
     *
     * @ORM\ManyToOne(targetEntity="CmsLink")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="root_link", referencedColumnName="id")
     * })
     */
    private $rootLink;


}

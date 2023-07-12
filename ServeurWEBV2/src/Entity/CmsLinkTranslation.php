<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CmsLinkTranslation
 *
 * @ORM\Table(name="cms_link_translation", uniqueConstraints={@ORM\UniqueConstraint(name="lookup_unique_translation_idx", columns={"locale", "object_id", "field"})}, indexes={@ORM\Index(name="IDX_E9F62846232D562B", columns={"object_id"})})
 * @ORM\Entity
 */
class CmsLinkTranslation
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
     * @ORM\Column(name="locale", type="string", length=8, nullable=false)
     */
    private $locale;

    /**
     * @var string
     *
     * @ORM\Column(name="field", type="string", length=32, nullable=false)
     */
    private $field;

    /**
     * @var string|null
     *
     * @ORM\Column(name="content", type="text", length=0, nullable=true)
     */
    private $content;

    /**
     * @var \CmsLink
     *
     * @ORM\ManyToOne(targetEntity="CmsLink")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="object_id", referencedColumnName="id")
     * })
     */
    private $object;


}

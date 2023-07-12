<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CmsItem
 *
 * @ORM\Table(name="cms_item", indexes={@ORM\Index(name="IDX_D88D8863CFC71007", columns={"slider"}), @ORM\Index(name="IDX_D88D8863BC68B450", columns={"background"})})
 * @ORM\Entity
 */
class CmsItem
{
    /**
     * @var string|null
     *
     * @ORM\Column(name="cta_text", type="string", length=255, nullable=true)
     */
    private $ctaText;

    /**
     * @var string|null
     *
     * @ORM\Column(name="cta_url", type="string", length=255, nullable=true)
     */
    private $ctaUrl;

    /**
     * @var \MediaMedia
     *
     * @ORM\ManyToOne(targetEntity="MediaMedia")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="background", referencedColumnName="id")
     * })
     */
    private $background;

    /**
     * @var \CmsPost
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="CmsPost")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id", referencedColumnName="id")
     * })
     */
    private $id;

    /**
     * @var \CmsCollection
     *
     * @ORM\ManyToOne(targetEntity="CmsCollection")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="slider", referencedColumnName="id")
     * })
     */
    private $slider;


}

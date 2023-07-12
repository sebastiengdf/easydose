<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CmsAttribute
 *
 * @ORM\Table(name="cms_attribute")
 * @ORM\Entity
 */
class CmsAttribute
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
     * @var string
     *
     * @ORM\Column(name="value", type="string", length=255, nullable=false)
     */
    private $value;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="CmsLink", mappedBy="routeArg")
     */
    private $link;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->link = new \Doctrine\Common\Collections\ArrayCollection();
    }

}

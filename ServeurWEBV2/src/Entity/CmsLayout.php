<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CmsLayout
 *
 * @ORM\Table(name="cms_layout")
 * @ORM\Entity
 */
class CmsLayout
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
     * @ORM\Column(name="content", type="text", length=0, nullable=true)
     */
    private $content;


}

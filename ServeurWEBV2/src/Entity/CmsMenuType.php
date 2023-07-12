<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CmsMenuType
 *
 * @ORM\Table(name="cms_menu_type")
 * @ORM\Entity
 */
class CmsMenuType
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
     * @ORM\Column(name="template_path", type="text", length=0, nullable=false)
     */
    private $templatePath;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    private $name;


}

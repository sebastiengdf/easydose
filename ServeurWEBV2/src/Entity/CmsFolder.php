<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CmsFolder
 *
 * @ORM\Table(name="cms_folder", uniqueConstraints={@ORM\UniqueConstraint(name="UNIQ_DE5416B5989D9B62", columns={"slug"})})
 * @ORM\Entity
 */
class CmsFolder
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
     * @ORM\Column(name="slug", type="string", length=255, nullable=true)
     */
    private $slug;


}

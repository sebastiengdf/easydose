<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;

 /**
 * Bodyparts
 * @ApiResource(
 *     collectionOperations={"get"},
 *     itemOperations={"get", "put", "delete"}
 * )
 **
 * @ORM\Table(name="bodyparts")
 * @ORM\Entity
 */
class Bodyparts
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
     * @ORM\Column(name="dcmname", type="string", length=255, nullable=false)
     */
    private $dcmname;

    /**
     * @var string
     *
     * @ORM\Column(name="easydosename", type="string", length=255, nullable=false)
     */
    private $easydosename;
    /**
     * @return number
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getDcmname()
    {
        return $this->dcmname;
    }

    /**
     * @return string
     */
    public function getEasydosename()
    {
        return $this->easydosename;
    }

    /**
     * @param number $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param string $dcmname
     */
    public function setDcmname($dcmname)
    {
        $this->dcmname = $dcmname;
    }

    /**
     * @param string $easydosename
     */
    public function setEasydosename($easydosename)
    {
        $this->easydosename = $easydosename;
    }


}

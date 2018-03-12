<?php

/*
 *
 */

namespace EasternColor\DoctrineToolsBundle\Entity\Traits;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

trait Enabled
{
    /**
     * @var bool
     *
     * @Groups({"common"})
     *
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $enabled;

    /**
     * Get the value of Enabled.
     *
     * @return bool
     */
    public function getEnabled()
    {
        return $this->enabled;
    }

    /**
     * Set the value of Enabled.
     *
     * @param bool enabled
     *
     * @return self
     */
    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;

        return $this;
    }
}

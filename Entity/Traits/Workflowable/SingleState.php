<?php

/*
 *
 */

namespace EasternColor\DoctrineToolsBundle\Entity\Traits\Workflowable;

use Doctrine\ORM\Mapping as ORM;

trait SingleState
{
    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    public $currentPlace;

    /**
     * Get the value of Current Place.
     *
     * @return mixed
     */
    public function getCurrentPlace()
    {
        return $this->currentPlace;
    }

    /**
     * Set the value of Current Place.
     *
     * @param mixed currentPlace
     *
     * @return self
     */
    public function setCurrentPlace($currentPlace)
    {
        $this->currentPlace = $currentPlace;

        return $this;
    }
}

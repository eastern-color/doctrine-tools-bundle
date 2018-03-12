<?php

/*
 *
 */

namespace EasternColor\DoctrineToolsBundle\Entity\Traits;

use DateTime;
use Doctrine\ORM\Mapping as ORM;

trait ReleaseExpiry
{
    /**
     * @var DateTime
     *
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $release;

    /**
     * @var DateTime
     *
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $expiry;

    /**
     * Get the value of Release.
     *
     * @return DateTime
     */
    public function getRelease()
    {
        return $this->release;
    }

    /**
     * Set the value of Release.
     *
     * @param DateTime release
     *
     * @return self
     */
    public function setRelease($release)
    {
        $this->release = $release;

        return $this;
    }

    /**
     * Get the value of Expiry.
     *
     * @return DateTime
     */
    public function getExpiry()
    {
        return $this->expiry;
    }

    /**
     * Set the value of Expiry.
     *
     * @param DateTime expiry
     *
     * @return self
     */
    public function setExpiry($expiry)
    {
        $this->expiry = $expiry;

        return $this;
    }
}

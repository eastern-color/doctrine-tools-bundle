<?php

/*
 *
 */

namespace EasternColor\DoctrineToolsBundle\Entity\Traits;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

trait Alias
{
    /**
     * @var string
     *
     * @Groups({"common"})
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $alias;

    /**
     * Get the value of Alias.
     *
     * @return string
     */
    public function getAlias()
    {
        return $this->alias;
    }

    /**
     * Set the value of Alias.
     *
     * @param string alias
     *
     * @return self
     */
    public function setAlias($alias)
    {
        $this->alias = $alias;

        return $this;
    }
}

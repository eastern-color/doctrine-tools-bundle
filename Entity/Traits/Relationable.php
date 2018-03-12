<?php

/*
 *
 */

namespace EasternColor\DoctrineToolsBundle\Entity\Traits;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
trait Relationable
{
  public function __get($name)
  {
    if ($this->{$name} instanceof ArrayCollection) {
      return $this->{$name};
    }
  }
}

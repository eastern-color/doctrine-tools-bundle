<?php

/*
 *
 */
namespace EasternColor\DoctrineToolsBundle\Entity\Traits;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
trait Locale
{
    /**
     * @var string
     * @ORM\Column(name="locale", type="string", length=10)
     */
    private $locale;

    /**
     * Set locale
     *
     * @param string $locale
     *
     * @return static
     */
    public function setLocale($locale)
    {
        $this->locale = $locale;

        return $this;
    }

    /**
     * Get locale
     *
     * @return string
     */
    public function getLocale()
    {
        return $this->locale;
    }

}

<?php

/*
 *
 */

namespace EasternColor\DoctrineToolsBundle\Entity\Traits;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
trait ViewLog
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="viewed_at", type="datetime")
     */
    private $viewedAt;

    /**
     * @var string
     *
     * @ORM\Column(name="http_referer", type="string", length=255, nullable=true)
     */
    private $httpReferer;

    /**
     * @var string
     *
     * @ORM\Column(name="http_user_agent", type="string", length=255, nullable=true)
     */
    private $httpUserAgent;

    /**
     * @var string
     *
     * @ORM\Column(name="query_string", type="string", length=255, nullable=true)
     */
    private $queryString;

    /**
     * @var string
     *
     * @ORM\Column(name="client_ip", type="string", length=20, nullable=true)
     */
    private $clientIp;

    /**
     * @var string
     *
     * @ORM\Column(name="client_region", type="string", length=2, nullable=true)
     */
    private $clientRegion;

    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set viewedAt.
     *
     * @param \DateTime $viewedAt
     *
     * @return static
     */
    public function setViewedAt($viewedAt)
    {
        $this->viewedAt = $viewedAt;

        return $this;
    }

    /**
     * Get viewedAt.
     *
     * @return \DateTime
     */
    public function getViewedAt()
    {
        return $this->viewedAt;
    }

    /**
     * Set httpReferer.
     *
     * @param string $httpReferer
     *
     * @return static
     */
    public function setHttpReferer($httpReferer)
    {
        $this->httpReferer = $httpReferer;

        return $this;
    }

    /**
     * Get httpReferer.
     *
     * @return string
     */
    public function getHttpReferer()
    {
        return $this->httpReferer;
    }

    /**
     * Get the value of Http User Agent.
     *
     * @return string
     */
    public function getHttpUserAgent()
    {
        return $this->httpUserAgent;
    }

    /**
     * Set the value of Http User Agent.
     *
     * @param string httpUserAgent
     *
     * @return self
     */
    public function setHttpUserAgent($httpUserAgent)
    {
        $this->httpUserAgent = $httpUserAgent;

        return $this;
    }

    /**
     * Get the value of Client Ip.
     *
     * @return string
     */
    public function getClientIp()
    {
        return $this->clientIp;
    }

    /**
     * Set the value of Client Ip.
     *
     * @param string clientIp
     *
     * @return self
     */
    public function setClientIp($clientIp)
    {
        $this->clientIp = $clientIp;

        return $this;
    }

    /**
     * Get the value of Client Region.
     *
     * @return string
     */
    public function getClientRegion()
    {
        return $this->clientRegion;
    }

    /**
     * Set the value of Client Region.
     *
     * @param string clientRegion
     *
     * @return self
     */
    public function setClientRegion($clientRegion)
    {
        $this->clientRegion = $clientRegion;

        return $this;
    }

    /**
     * Get the value of Query String.
     *
     * @return string
     */
    public function getQueryString()
    {
        return $this->queryString;
    }

    /**
     * Set the value of Query String.
     *
     * @param string queryString
     *
     * @return self
     */
    public function setQueryString($queryString)
    {
        $this->queryString = $queryString;

        return $this;
    }
}

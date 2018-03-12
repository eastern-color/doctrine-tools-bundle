<?php

/*
 *
 */

namespace EasternColor\DoctrineToolsBundle\Entity\Traits;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
trait DeviceApiKey
{
    /**
     * @var string
     *
     * @ORM\Column(name="cordova_device_id", type="string", length=255)
     */
    private $cordovaDeviceId;

    /**
     * @var string
     *
     * @ORM\Column(name="cordova_manufacturer", type="string", length=255)
     */
    private $cordovaDeviceManufacturer;

    /**
     * @var string
     *
     * @ORM\Column(name="cordova_model", type="string", length=255)
     */
    private $cordovaDeviceModel;

    /**
     * @var string
     *
     * @ORM\Column(name="cordova_platform", type="string", length=255)
     */
    private $cordovaDevicePlatform;

    /**
     * @var string
     *
     * @ORM\Column(name="cordova_version", type="string", length=255)
     */
    private $cordovaDeviceVersion;

    /**
     * @var string
     *
     * @ORM\Column(name="cordova_serial", type="string", length=255)
     */
    private $cordovaDeviceSerial;

    /**
     * @var string
     *
     * @ORM\Column(name="fcm_token", type="text", nullable=true)
     */
    private $fcmToken;

    /**
     * @var DateTime
     * @ORM\Column(name="last_viewed_at", type="datetime")
     */
    private $lastViewedAt;

    /**
     * Get the value of Cordova Device Id.
     *
     * @return string
     */
    public function getCordovaDeviceId()
    {
        return $this->cordovaDeviceId;
    }

    /**
     * Set the value of Cordova Device Id.
     *
     * @param string cordovaDeviceId
     *
     * @return self
     */
    public function setCordovaDeviceId($cordovaDeviceId)
    {
        $this->cordovaDeviceId = $cordovaDeviceId;

        return $this;
    }

    /**
     * Get the value of Cordova Device Manufacturer.
     *
     * @return string
     */
    public function getCordovaDeviceManufacturer()
    {
        return $this->cordovaDeviceManufacturer;
    }

    /**
     * Set the value of Cordova Device Manufacturer.
     *
     * @param string cordovaDeviceManufacturer
     *
     * @return self
     */
    public function setCordovaDeviceManufacturer($cordovaDeviceManufacturer)
    {
        $this->cordovaDeviceManufacturer = $cordovaDeviceManufacturer;

        return $this;
    }

    /**
     * Get the value of Cordova Device Model.
     *
     * @return string
     */
    public function getCordovaDeviceModel()
    {
        return $this->cordovaDeviceModel;
    }

    /**
     * Set the value of Cordova Device Model.
     *
     * @param string cordovaDeviceModel
     *
     * @return self
     */
    public function setCordovaDeviceModel($cordovaDeviceModel)
    {
        $this->cordovaDeviceModel = $cordovaDeviceModel;

        return $this;
    }

    /**
     * Get the value of Cordova Device Platform.
     *
     * @return string
     */
    public function getCordovaDevicePlatform()
    {
        return $this->cordovaDevicePlatform;
    }

    /**
     * Set the value of Cordova Device Platform.
     *
     * @param string cordovaDevicePlatform
     *
     * @return self
     */
    public function setCordovaDevicePlatform($cordovaDevicePlatform)
    {
        $this->cordovaDevicePlatform = $cordovaDevicePlatform;

        return $this;
    }

    /**
     * Get the value of Cordova Device Version.
     *
     * @return string
     */
    public function getCordovaDeviceVersion()
    {
        return $this->cordovaDeviceVersion;
    }

    /**
     * Set the value of Cordova Device Version.
     *
     * @param string cordovaDeviceVersion
     *
     * @return self
     */
    public function setCordovaDeviceVersion($cordovaDeviceVersion)
    {
        $this->cordovaDeviceVersion = $cordovaDeviceVersion;

        return $this;
    }

    /**
     * Get the value of Cordova Device Serial.
     *
     * @return string
     */
    public function getCordovaDeviceSerial()
    {
        return $this->cordovaDeviceSerial;
    }

    /**
     * Set the value of Cordova Device Serial.
     *
     * @param string cordovaDeviceSerial
     *
     * @return self
     */
    public function setCordovaDeviceSerial($cordovaDeviceSerial)
    {
        $this->cordovaDeviceSerial = $cordovaDeviceSerial;

        return $this;
    }

    /**
     * Get the value of Fcm Token.
     *
     * @return string
     */
    public function getFcmToken()
    {
        return $this->fcmToken;
    }

    /**
     * Set the value of Fcm Token.
     *
     * @param string fcmToken
     *
     * @return self
     */
    public function setFcmToken($fcmToken)
    {
        $this->fcmToken = $fcmToken;

        return $this;
    }

    /**
     * Get the value of Last Viewed At.
     *
     * @return DateTime
     */
    public function getLastViewedAt()
    {
        return $this->lastViewedAt;
    }

    /**
     * Set the value of Last Viewed At.
     *
     * @param DateTime lastViewedAt
     *
     * @return self
     */
    public function setLastViewedAt($lastViewedAt)
    {
        $this->lastViewedAt = $lastViewedAt;

        return $this;
    }
}

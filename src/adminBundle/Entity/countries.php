<?php

namespace adminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;


/**
 * countries
 *
 * @ORM\Table(name="countries")
 * @ORM\Entity(repositoryClass="adminBundle\Repository\countriesRepository")
 */
class countries
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
     * @var string
     *
     * @ORM\Column(name="code", type="string", length=255, unique=true)
     */
    private $code;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="update_at", type="datetime")
     */
    private $updateAt;


    /**
     *
     * @ORM\OneToMany(targetEntity="adminBundle\Entity\User", mappedBy="user_country")
     */
    private $contry_user;

    /**
     *
     * @ORM\OneToMany(targetEntity="adminBundle\Entity\regions", mappedBy="country_reg")
     */
    private $country_region;


    /**
     *
     * @ORM\OneToMany(targetEntity="adminBundle\Entity\Hotels", mappedBy="hotel_country")
     */
    private $country_hotel;


    public function __construct() {
        $this->country_region = new ArrayCollection();
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set code
     *
     * @param string $code
     *
     * @return countries
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return countries
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return countries
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @return \DateTime
     */
    public function getUpdateAt()
    {
        return $this->updateAt;
    }

    /**
     * @param \DateTime $updateAt
     */
    public function setUpdateAt($updateAt)
    {
        $this->updateAt = $updateAt;
    }

    /**
     * @return mixed
     */
    public function getContryUser()
    {
        return $this->contry_user;
    }

    /**
     * @param mixed $contry_user
     */
    public function setContryUser($contry_user)
    {
        $this->contry_user = $contry_user;
    }

    /**
     * @return mixed
     */
    public function getCountryRegion()
    {
        return $this->country_region;
    }

    /**
     * @param mixed $country_region
     */
    public function setCountryRegion($country_region)
    {
        $this->country_region = $country_region;
    }

    /**
     * @return mixed
     */
    public function getCountryHotel()
    {
        return $this->country_hotel;
    }

    /**
     * @param mixed $country_hotel
     */
    public function setCountryHotel($country_hotel)
    {
        $this->country_hotel = $country_hotel;
    }



}


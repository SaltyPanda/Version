<?php

namespace adminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;


/**
 * regions
 *
 * @ORM\Table(name="regions")
 * @ORM\Entity(repositoryClass="adminBundle\Repository\regionsRepository")
 */
class regions
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
     * @ORM\Column(name="update_at", type="datetime",nullable=true)
     */
    private $update_At;


    /**
     * @ORM\ManyToOne(targetEntity="adminBundle\Entity\countries",inversedBy="country_region")
     * @ORM\JoinColumn(name="country_id",referencedColumnName="id")
     */
    public $country_reg;


    /**
     *
     * @ORM\OneToMany(targetEntity="adminBundle\Entity\User", mappedBy="user_region")
     */
    private $region_user;

    /**
     * @return mixed
     */
    public function getCountryReg()
    {
        return $this->country_reg;
    }

    /**
     * @param mixed $country_reg
     */
    public function setCountryReg($country_reg)
    {
        $this->country_reg = $country_reg;
    }


    /**
     *
     * @ORM\OneToMany(targetEntity="adminBundle\Entity\districts", mappedBy="district_region")
     */
    private $district_region;

    /**
     *
     * @ORM\OneToMany(targetEntity="adminBundle\Entity\Hotels", mappedBy="hotel_region")
     */
    private $region_hotel;



    public function __construct() {
        $this->district_region = new ArrayCollection();
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
     * Set name
     *
     * @param string $name
     *
     * @return regions
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
     * @return regions
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
        return $this->update_At;
    }

    /**
     * @param \DateTime $update_At
     */
    public function setUpdateAt($update_At)
    {
        $this->update_At = $update_At;
    }



    /**
     * @return mixed
     */
    public function getDistrictRegion()
    {
        return $this->district_region;
    }

    /**
     * @param mixed $district_region
     */
    public function setDistrictRegion($district_region)
    {
        $this->district_region = $district_region;
    }

    /**
     * @return mixed
     */
    public function getRegionHotel()
    {
        return $this->region_hotel;
    }

    /**
     * @param mixed $region_hotel
     */
    public function setRegionHotel($region_hotel)
    {
        $this->region_hotel = $region_hotel;
    }

    /**
     * @return mixed
     */
    public function getRegionUser()
    {
        return $this->region_user;
    }

    /**
     * @param mixed $region_user
     */
    public function setRegionUser($region_user)
    {
        $this->region_user = $region_user;
    }



}


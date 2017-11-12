<?php

namespace adminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;


/**
 * districts
 *
 * @ORM\Table(name="districts")
 * @ORM\Entity(repositoryClass="adminBundle\Repository\districtsRepository")
 */
class districts
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
    private $updateAt;


    /**
     * @ORM\ManyToOne(targetEntity="adminBundle\Entity\regions",inversedBy="district_region")
     * @ORM\JoinColumn(name="region_id",referencedColumnName="id")
     */
    private $district_region;


    /**
     *
     * @ORM\OneToMany(targetEntity="adminBundle\Entity\cities", mappedBy="district_cities")
     */
    private $district_cit;

    /**
     *
     * @ORM\OneToMany(targetEntity="adminBundle\Entity\Hotels", mappedBy="hotel_district")
     */
    private $district_hotel;


    /**
     *
     * @ORM\OneToMany(targetEntity="adminBundle\Entity\User", mappedBy="user_district")
     */
    private $district_user;



    public function __construct() {
        $this->district_cit = new ArrayCollection();
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
     * @return districts
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
     * @return districts
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
     * Set updateAt
     *
     * @param \DateTime $updateAt
     *
     * @return districts
     */
    public function setUpdateAt($updateAt)
    {
        $this->updateAt = $updateAt;

        return $this;
    }

    /**
     * Get updateAt
     *
     * @return \DateTime
     */
    public function getUpdateAt()
    {
        return $this->updateAt;
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
    public function getDistrictCit()
    {
        return $this->district_cit;
    }

    /**
     * @param mixed $district_cit
     */
    public function setDistrictCit($district_cit)
    {
        $this->district_cit = $district_cit;
    }

    /**
     * @return mixed
     */
    public function getDistrictHotel()
    {
        return $this->district_hotel;
    }

    /**
     * @param mixed $district_hotel
     */
    public function setDistrictHotel($district_hotel)
    {
        $this->district_hotel = $district_hotel;
    }

    /**
     * @return mixed
     */
    public function getDistrictUser()
    {
        return $this->district_user;
    }

    /**
     * @param mixed $district_user
     */
    public function setDistrictUser($district_user)
    {
        $this->district_user = $district_user;
    }




}


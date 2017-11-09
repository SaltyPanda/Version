<?php

namespace adminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * cities
 *
 * @ORM\Table(name="cities")
 * @ORM\Entity(repositoryClass="adminBundle\Repository\citiesRepository")
 */
class cities
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
     * @ORM\Column(name="update_at", type="datetime")
     */
    private $update_at;


    /**
     * @ORM\ManyToOne(targetEntity="adminBundle\Entity\districts",inversedBy="district_cit")
     * @ORM\JoinColumn(name="district_id",referencedColumnName="id")
     */
    private $district_cities;

    /**
     *
     * @ORM\OneToMany(targetEntity="adminBundle\Entity\Hotels", mappedBy="hotel_city")
     */
    private $city_hotel;

    /**
     *
     * @ORM\OneToMany(targetEntity="adminBundle\Entity\User", mappedBy="user_city")
     */
    private $city_user;

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
     * @return cities
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
     * @return cities
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
        return $this->update_at;
    }

    /**
     * @param \DateTime $update_at
     */
    public function setUpdateAt($update_at)
    {
        $this->update_at = $update_at;
    }

    /**
     * @return mixed
     */
    public function getDistrictCities()
    {
        return $this->district_cities;
    }

    /**
     * @param mixed $district_cities
     */
    public function setDistrictCities($district_cities)
    {
        $this->district_cities = $district_cities;
    }

    /**
     * @return mixed
     */
    public function getCityHotel()
    {
        return $this->city_hotel;
    }

    /**
     * @param mixed $city_hotel
     */
    public function setCityHotel($city_hotel)
    {
        $this->city_hotel = $city_hotel;
    }

    /**
     * @return mixed
     */
    public function getCityUser()
    {
        return $this->city_user;
    }

    /**
     * @param mixed $city_user
     */
    public function setCityUser($city_user)
    {
        $this->city_user = $city_user;
    }



}


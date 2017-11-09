<?php

namespace adminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Hotels
 *
 * @ORM\Table(name="hotels")
 * @ORM\Entity(repositoryClass="adminBundle\Repository\HotelsRepository")
 */
class Hotels
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
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var int
     *
     * @ORM\Column(name="stars", type="integer")
     */
    private $stars;

    /**
     * @var string
     *
     * @ORM\Column(name="main_picture", type="string", length=255)
     */
    private $mainPicture;

    /**
     * @var string
     *
     * @ORM\Column(name="logo_image", type="string", length=255)
     */
    private $logoImage;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated_at", type="datetime")
     */
    private $updatedAt;

    /**
     * @var string
     *
     * @ORM\Column(name="address", type="string", length=255)
     */
    private $address;

    /**
     * @var int
     *
     * @ORM\Column(name="zip", type="integer")
     */
    private $zip;

    /**
     * @var string
     *
     * @ORM\Column(name="latitude", type="string", length=255)
     */
    private $latitude;

    /**
     * @var string
     *
     * @ORM\Column(name="longitude", type="string", length=255)
     */
    private $longitude;

    /**
     * @var string
     *
     * @ORM\Column(name="keywords", type="string", length=255)
     */
    private $keywords;

    /**
     * @var int
     *
     * @ORM\Column(name="publisch", type="integer")
     */
    private $publisch;

    /**
     * @var int
     *
     * @ORM\Column(name="top", type="integer")
     */
    private $top;

    /**
     * @var string
     *
     * @ORM\Column(name="tp", type="string", length=255)
     */
    private $tp;

    /**
     * @var string
     *
     * @ORM\Column(name="tp2", type="string", length=255)
     */
    private $tp2;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;


    /**
     * @ORM\ManyToOne(targetEntity="adminBundle\Entity\countries",inversedBy="country_hotel")
     * @ORM\JoinColumn(name="country_id",referencedColumnName="id")
     */
    private $hotel_country;

    /**
     * @ORM\ManyToOne(targetEntity="adminBundle\Entity\regions",inversedBy="region_hotel")
     * @ORM\JoinColumn(name="region_id",referencedColumnName="id")
     */
    private $hotel_region;

    /**
     * @ORM\ManyToOne(targetEntity="adminBundle\Entity\districts",inversedBy="district_hotel")
     * @ORM\JoinColumn(name="district_id",referencedColumnName="id")
     */
    private $hotel_district;

    /**
     * @ORM\ManyToOne(targetEntity="adminBundle\Entity\cities",inversedBy="city_hotel")
     * @ORM\JoinColumn(name="city_id",referencedColumnName="id")
     */
    private $hotel_city;

    /**
     * @ORM\ManyToOne(targetEntity="adminBundle\Entity\User",inversedBy="customer_hotel")
     * @ORM\JoinColumn(name="customer_id",referencedColumnName="id")
     */
    private $hotel_customer;


    /**
     * @ORM\ManyToOne(targetEntity="adminBundle\Entity\seasons",inversedBy="type_hotel")
     * @ORM\JoinColumn(name="type_id",referencedColumnName="id")
     */
    private $hotel_type;

    /**
     *
     * @ORM\OneToMany(targetEntity="adminBundle\Entity\Hotels", mappedBy="season_hotel")
     */
    private $hotel_season;

    /**
     *
     * @ORM\OneToMany(targetEntity="adminBundle\Entity\rooms", mappedBy="room_hotel")
     */
    private $hotel_room;





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
     * @return Hotels
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
     * Set type
     *
     * @param string $type
     *
     * @return Hotels
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Hotels
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set stars
     *
     * @param integer $stars
     *
     * @return Hotels
     */
    public function setStars($stars)
    {
        $this->stars = $stars;

        return $this;
    }

    /**
     * Get stars
     *
     * @return int
     */
    public function getStars()
    {
        return $this->stars;
    }

    /**
     * Set mainPicture
     *
     * @param string $mainPicture
     *
     * @return Hotels
     */
    public function setMainPicture($mainPicture)
    {
        $this->mainPicture = $mainPicture;

        return $this;
    }

    /**
     * Get mainPicture
     *
     * @return string
     */
    public function getMainPicture()
    {
        return $this->mainPicture;
    }

    /**
     * Set logoImage
     *
     * @param string $logoImage
     *
     * @return Hotels
     */
    public function setLogoImage($logoImage)
    {
        $this->logoImage = $logoImage;

        return $this;
    }

    /**
     * Get logoImage
     *
     * @return string
     */
    public function getLogoImage()
    {
        return $this->logoImage;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Hotels
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
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     *
     * @return Hotels
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set address
     *
     * @param string $address
     *
     * @return Hotels
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set zip
     *
     * @param integer $zip
     *
     * @return Hotels
     */
    public function setZip($zip)
    {
        $this->zip = $zip;

        return $this;
    }

    /**
     * Get zip
     *
     * @return int
     */
    public function getZip()
    {
        return $this->zip;
    }

    /**
     * Set latitude
     *
     * @param string $latitude
     *
     * @return Hotels
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;

        return $this;
    }

    /**
     * Get latitude
     *
     * @return string
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * Set longitude
     *
     * @param string $longitude
     *
     * @return Hotels
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;

        return $this;
    }

    /**
     * Get longitude
     *
     * @return string
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * Set keywords
     *
     * @param string $keywords
     *
     * @return Hotels
     */
    public function setKeywords($keywords)
    {
        $this->keywords = $keywords;

        return $this;
    }

    /**
     * Get keywords
     *
     * @return string
     */
    public function getKeywords()
    {
        return $this->keywords;
    }

    /**
     * Set publisch
     *
     * @param integer $publisch
     *
     * @return Hotels
     */
    public function setPublisch($publisch)
    {
        $this->publisch = $publisch;

        return $this;
    }

    /**
     * Get publisch
     *
     * @return int
     */
    public function getPublisch()
    {
        return $this->publisch;
    }

    /**
     * Set top
     *
     * @param integer $top
     *
     * @return Hotels
     */
    public function setTop($top)
    {
        $this->top = $top;

        return $this;
    }

    /**
     * Get top
     *
     * @return int
     */
    public function getTop()
    {
        return $this->top;
    }

    /**
     * Set tp
     *
     * @param string $tp
     *
     * @return Hotels
     */
    public function setTp($tp)
    {
        $this->tp = $tp;

        return $this;
    }

    /**
     * Get tp
     *
     * @return string
     */
    public function getTp()
    {
        return $this->tp;
    }

    /**
     * Set tp2
     *
     * @param string $tp2
     *
     * @return Hotels
     */
    public function setTp2($tp2)
    {
        $this->tp2 = $tp2;

        return $this;
    }

    /**
     * Get tp2
     *
     * @return string
     */
    public function getTp2()
    {
        return $this->tp2;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Hotels
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return mixed
     */
    public function getHotelRegion()
    {
        return $this->hotel_region;
    }

    /**
     * @param mixed $hotel_region
     */
    public function setHotelRegion($hotel_region)
    {
        $this->hotel_region = $hotel_region;
    }

    /**
     * @return mixed
     */
    public function getHotelDistrict()
    {
        return $this->hotel_district;
    }

    /**
     * @param mixed $hotel_district
     */
    public function setHotelDistrict($hotel_district)
    {
        $this->hotel_district = $hotel_district;
    }

    /**
     * @return mixed
     */
    public function getHotelCity()
    {
        return $this->hotel_city;
    }

    /**
     * @param mixed $hotel_city
     */
    public function setHotelCity($hotel_city)
    {
        $this->hotel_city = $hotel_city;
    }


    /**
     * @return mixed
     */
    public function getHotelCountry()
    {
        return $this->hotel_country;
    }

    /**
     * @param mixed $hotel_country
     */
    public function setHotelCountry($hotel_country)
    {
        $this->hotel_country = $hotel_country;
    }

    /**
     * @return mixed
     */
    public function getHotelCustomer()
    {
        return $this->hotel_customer;
    }

    /**
     * @param mixed $hotel_customer
     */
    public function setHotelCustomer($hotel_customer)
    {
        $this->hotel_customer = $hotel_customer;
    }

    /**
     * @return mixed
     */
    public function getHotelType()
    {
        return $this->hotel_type;
    }

    /**
     * @param mixed $hotel_type
     */
    public function setHotelType($hotel_type)
    {
        $this->hotel_type = $hotel_type;
    }



}


<?php

namespace adminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * roomrates
 *
 * @ORM\Table(name="roomrates")
 * @ORM\Entity(repositoryClass="adminBundle\Repository\roomratesRepository")
 */
class roomrates
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
     * @ORM\Column(name="heading", type="string", length=255)
     */
    private $heading;

    /**
     * @var int
     *
     * @ORM\Column(name="meal", type="integer")
     */
    private $meal;

    /**
     * @var int
     *
     * @ORM\Column(name="preprice", type="integer")
     */
    private $preprice;

    /**
     * @var int
     *
     * @ORM\Column(name="price", type="integer")
     */
    private $price;

    /**
     * @var int
     *
     * @ORM\Column(name="k_price", type="integer")
     */
    private $kPrice;

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
     * @ORM\ManyToOne(targetEntity="adminBundle\Entity\rooms",inversedBy="rooms_rat")
     * @ORM\JoinColumn(name="room_id",referencedColumnName="id")
     */
    public $roomrates_r;

    /**
     * @ORM\ManyToOne(targetEntity="adminBundle\Entity\seasons",inversedBy="season_roomrates")
     * @ORM\JoinColumn(name="season_id",referencedColumnName="id")
     */
    private $roomrates_season;


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
     * Set heading
     *
     * @param string $heading
     *
     * @return roomrates
     */
    public function setHeading($heading)
    {
        $this->heading = $heading;

        return $this;
    }

    /**
     * Get heading
     *
     * @return string
     */
    public function getHeading()
    {
        return $this->heading;
    }

    /**
     * Set meal
     *
     * @param integer $meal
     *
     * @return roomrates
     */
    public function setMeal($meal)
    {
        $this->meal = $meal;

        return $this;
    }

    /**
     * Get meal
     *
     * @return int
     */
    public function getMeal()
    {
        return $this->meal;
    }

    /**
     * Set preprice
     *
     * @param integer $preprice
     *
     * @return roomrates
     */
    public function setPreprice($preprice)
    {
        $this->preprice = $preprice;

        return $this;
    }

    /**
     * Get preprice
     *
     * @return int
     */
    public function getPreprice()
    {
        return $this->preprice;
    }

    /**
     * Set price
     *
     * @param integer $price
     *
     * @return roomrates
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return int
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set kPrice
     *
     * @param integer $kPrice
     *
     * @return roomrates
     */
    public function setKPrice($kPrice)
    {
        $this->kPrice = $kPrice;

        return $this;
    }

    /**
     * Get kPrice
     *
     * @return int
     */
    public function getKPrice()
    {
        return $this->kPrice;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return roomrates
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
     * @return roomrates
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
}


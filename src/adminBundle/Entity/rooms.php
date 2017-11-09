<?php

namespace adminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * rooms
 *
 * @ORM\Table(name="rooms")
 * @ORM\Entity(repositoryClass="adminBundle\Repository\roomsRepository")
 */
class rooms
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
     * @ORM\Column(name="heading", type="string", length=255)
     */
    private $heading;

    /**
     * @var int
     *
     * @ORM\Column(name="room_number", type="integer")
     */
    private $roomNumber;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var int
     *
     * @ORM\Column(name="publish", type="integer")
     */
    private $publish;

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
     * @ORM\ManyToOne(targetEntity="adminBundle\Entity\Hotels",inversedBy="hotel_room")
     * @ORM\JoinColumn(name="hotel_id",referencedColumnName="id")
     */
    public $room_hotel;

    /**
     * @ORM\ManyToOne(targetEntity="adminBundle\Entity\categories",inversedBy="categ_room")
     * @ORM\JoinColumn(name="categorie_id",referencedColumnName="id")
     */
    public $room_categ;

    /**
     *
     * @ORM\OneToMany(targetEntity="adminBundle\Entity\roomrates", mappedBy="roomrates_r")
     */
    private $rooms_rat;


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
     * @return rooms
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
     * Set heading
     *
     * @param string $heading
     *
     * @return rooms
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
     * Set roomNumber
     *
     * @param integer $roomNumber
     *
     * @return rooms
     */
    public function setRoomNumber($roomNumber)
    {
        $this->roomNumber = $roomNumber;

        return $this;
    }

    /**
     * Get roomNumber
     *
     * @return int
     */
    public function getRoomNumber()
    {
        return $this->roomNumber;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return rooms
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
     * Set publish
     *
     * @param integer $publish
     *
     * @return rooms
     */
    public function setPublish($publish)
    {
        $this->publish = $publish;

        return $this;
    }

    /**
     * Get publish
     *
     * @return int
     */
    public function getPublish()
    {
        return $this->publish;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return rooms
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
     * @return rooms
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


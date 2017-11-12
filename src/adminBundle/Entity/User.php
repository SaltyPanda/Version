<?php
/**
 * Created by PhpStorm.
 * User: taher
 * Date: 06.11.17
 * Time: 21:29
 */

namespace adminBundle\Entity;
// src/AppBundle/Entity/User.php

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    public function __construct()
    {
        parent::__construct();
        // your own logic
    }

    /**
     * @var string
     *
     * @ORM\Column(name="fname", type="string", length=255)
     */
    public $fname;

    /**
     * @var string
     *
     * @ORM\Column(name="company", type="string", length=255)
     */
    public $company;


    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=255)
     */
    public $adresse;


    /**
     * @var string
     *
     * @ORM\Column(name="zip", type="string", length=255)
     */
    public $zip;

    /**
     * @var string
     *
     * @ORM\Column(name="nametitel", type="string", length=255)
     */
    public $nametitel;


    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255,nullable=true)
     */
    public $name;


    /**
     * @var string
     *
     * @ORM\Column(name="email2", type="string", length=255)
     */
    public $email2;

    /**
     * @var string
     *
     * @ORM\Column(name="web", type="string", length=255)
     */
    public $web;

    /**
     * @var string
     *
     * @ORM\Column(name="tp", type="string", length=255)
     */
    public $tp;

    /**
     * @var string
     *
     * @ORM\Column(name="tp2", type="string", length=255)
     */
    public $tp2;

    /**
     * @var string
     *
     * @ORM\Column(name="fax", type="string", length=255)
     */
    public $fax;

    /**
     * @var string
     *
     * @ORM\Column(name="vat", type="string", length=255 , nullable=true)
     */
    public $vat;

    /**
     * @var string
     *
     * @ORM\Column(name="logo", type="string", length=255)
     */
    public $logo;

    /**
     * Many countries have One user.
     * @ORM\ManyToOne(targetEntity="adminBundle\Entity\countries", inversedBy="contry_user")
     * @ORM\JoinColumn(name="Country_user", referencedColumnName="id")
     */
    private $user_country;

    /**
     * Many user have One region.
     * @ORM\ManyToOne(targetEntity="adminBundle\Entity\regions", inversedBy="region_user")
     * @ORM\JoinColumn(name="region_user", referencedColumnName="id")
     */
    private $user_region;

    /**
     * Many user have One region.
     * @ORM\ManyToOne(targetEntity="adminBundle\Entity\districts", inversedBy="district_user")
     * @ORM\JoinColumn(name="district_user", referencedColumnName="id")
     */
    private $user_district;

    /**
     * Many user have One region.
     * @ORM\ManyToOne(targetEntity="adminBundle\Entity\cities", inversedBy="city_user")
     * @ORM\JoinColumn(name="city_user", referencedColumnName="id")
     */
    private $user_city;

    /**
     * @return string
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * @param string $company
     */
    public function setCompany($company)
    {
        $this->company = $company;
    }

    /**
     * @return string
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * @param string $adresse
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;
    }

    /**
     * @return string
     */
    public function getNametitel()
    {
        return $this->nametitel;
    }

    /**
     * @param string $nametitel
     */
    public function setNametitel($nametitel)
    {
        $this->nametitel = $nametitel;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getEmail2()
    {
        return $this->email2;
    }

    /**
     * @param string $email2
     */
    public function setEmail2($email2)
    {
        $this->email2 = $email2;
    }

    /**
     * @return string
     */
    public function getFname()
    {
        return $this->fname;
    }

    /**
     * @param string $fname
     */
    public function setFname($fname)
    {
        $this->fname = $fname;
    }

    /**
     * @return string
     */
    public function getFax()
    {
        return $this->fax;
    }

    /**
     * @param string $fax
     */
    public function setFax($fax)
    {
        $this->fax = $fax;
    }

    /**
     * @return string
     */
    public function getZip()
    {
        return $this->zip;
    }

    /**
     * @param string $zip
     */
    public function setZip($zip)
    {
        $this->zip = $zip;
    }

    /**
     * @return string
     */
    public function getWeb()
    {
        return $this->web;
    }

    /**
     * @param string $web
     */
    public function setWeb($web)
    {
        $this->web = $web;
    }

    /**
     * @return string
     */
    public function getTp()
    {
        return $this->tp;
    }

    /**
     * @param string $tp
     */
    public function setTp($tp)
    {
        $this->tp = $tp;
    }

    /**
     * @return string
     */
    public function getTp2()
    {
        return $this->tp2;
    }

    /**
     * @param string $tp2
     */
    public function setTp2($tp2)
    {
        $this->tp2 = $tp2;
    }

    /**
     * @return string
     */
    public function getVat()
    {
        return $this->vat;
    }

    /**
     * @param string $vat
     */
    public function setVat($vat)
    {
        $this->vat = $vat;
    }

    /**
     * @return string
     */
    public function getLogo()
    {
        return $this->logo;
    }

    /**
     * @param string $logo
     */
    public function setLogo($logo)
    {
        $this->logo = $logo;
    }

    /**
     * @return mixed
     */
    public function getUserCountry()
    {
        return $this->user_country;
    }

    /**
     * @param mixed $user_country
     */
    public function setUserCountry($user_country)
    {
        $this->user_country = $user_country;
    }

    /**
     * @return mixed
     */
    public function getUserRegion()
    {
        return $this->user_region;
    }

    /**
     * @param mixed $user_region
     */
    public function setUserRegion($user_region)
    {
        $this->user_region = $user_region;
    }

    /**
     * @return mixed
     */
    public function getUserDistrict()
    {
        return $this->user_district;
    }

    /**
     * @param mixed $user_district
     */
    public function setUserDistrict($user_district)
    {
        $this->user_district = $user_district;
    }

    /**
     * @return mixed
     */
    public function getUserCity()
    {
        return $this->user_city;
    }

    /**
     * @param mixed $user_city
     */
    public function setUserCity($user_city)
    {
        $this->user_city = $user_city;
    }





}
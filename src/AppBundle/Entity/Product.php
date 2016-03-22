<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Product
 *
 * @ORM\Table(name="product")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ProductRepository")
 */
class Product extends BaseEntity
{
    /**
     *
     * @ORM\ManyToOne(targetEntity="Category", inversedBy="products")
     * @ORM\JoinColumn(name="category_id", referencedColumnName="id")
     */
    private $category;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255, nullable=true)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="slug", type="string", length=255, nullable=true)
     */
    private $slug;

    /**
     * @var string
     *
     * @ORM\Column(name="titleAlternative", type="string", length=255, nullable=true)
     */
    private $titleAlternative;

    /**
     * @var string
     *
     * @ORM\Column(name="brand", type="string", length=255, nullable=true)
     */
    private $brand;

    /**
     * @var string
     *
     * @ORM\Column(name="model", type="string", length=255, nullable=true)
     */
    private $model;

    /**
     * @var string
     *
     * @ORM\Column(name="descrption", type="text", nullable=true)
     */
    private $descrption;

    /**
     * @var float
     *
     * @ORM\Column(name="price", type="decimal", precision=10, scale=2)
     */
    private $price;

    /**
     * @var float
     *
     * @ORM\Column(name="priceUsd", type="decimal", precision=10, scale=2)
     */
    private $priceUsd;

    /**
     * @var float
     *
     * @ORM\Column(name="priceSale", type="decimal", precision=10, scale=2)
     */
    private $priceSale;

    /**
     * @var float
     *
     * @ORM\Column(name="priceWholesale", type="decimal", precision=10, scale=2)
     */
    private $priceWholesale;

    /**
     * @var boolean
     *
     * @ORM\Column(name="status", type="boolean")
     */
    private $status;


    /**
     * @var float
     *
     * @ORM\Column(name="weight", type="decimal", precision=10, scale=2)
     */
    private $weight;

    /**
     * @var array
     *
     * @ORM\Column(name="image", type="array", nullable=true)
     */
    private $image;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\ProductGalery", mappedBy="product")
     */
    private $images;

    /**
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Product")
     */
    private $equipment;

    /**
     * @var string
     *
     * @ORM\Column(name="characteristics", type="text", nullable=true)
     */
    private $characteristics;

    /**
     * @var Page
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Page", inversedBy="products")
     */
    private $page;


    public function __construct()
    {
        $this->price = 0;
        $this->image = array();
        $this->images = new ArrayCollection();
        $this->equipment = new ArrayCollection();
    }

    /**
     * Set category
     *
     * @param \AppBundle\Entity\Category $category
     *
     * @return Product
     */
    public function setCategory($category)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return \AppBundle\Entity\Category $category
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Product
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set brand
     *
     * @param string $brand
     *
     * @return Product
     */
    public function setBrand($brand)
    {
        $this->brand = $brand;

        return $this;
    }

    /**
     * Get brand
     *
     * @return string
     */
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * Set model
     *
     * @param string $model
     *
     * @return Product
     */
    public function setModel($model)
    {
        $this->model = $model;

        return $this;
    }

    /**
     * Get model
     *
     * @return string
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * Set descrption
     *
     * @param string $descrption
     *
     * @return Product
     */
    public function setDescrption($descrption)
    {
        $this->descrption = $descrption;

        return $this;
    }

    /**
     * Get descrption
     *
     * @return string
     */
    public function getDescrption()
    {
        return $this->descrption;
    }

    /**
     * Set price
     *
     * @param float $price
     *
     * @return Product
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set image
     *
     * @param array $image
     *
     * @return Product
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return array
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @return mixed
     */
    public function getImages()
    {
        return $this->images;
    }

    /**
     * @param mixed $images
     */
    public function setImages($images)
    {
        $this->images = $images;
    }

    /**
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * @param string $slug
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;
    }

    /**
     * @return string
     */
    public function getTitleAlternative()
    {
        return $this->titleAlternative;
    }

    /**
     * @param string $titleAlternative
     */
    public function setTitleAlternative($titleAlternative)
    {
        $this->titleAlternative = $titleAlternative;
    }

    /**
     * @return mixed
     */
    public function getPriceUsd()
    {
        return $this->priceUsd;
    }

    /**
     * @param mixed $priceUsd
     */
    public function setPriceUsd($priceUsd)
    {
        $this->priceUsd = $priceUsd;
    }

    /**
     * @return float
     */
    public function getPriceSale()
    {
        return $this->priceSale;
    }

    /**
     * @param float $priceSale
     */
    public function setPriceSale($priceSale)
    {
        $this->priceSale = $priceSale;
    }

    /**
     * @return float
     */
    public function getPriceWholesale()
    {
        return $this->priceWholesale;
    }

    /**
     * @param float $priceWholesale
     */
    public function setPriceWholesale($priceWholesale)
    {
        $this->priceWholesale = $priceWholesale;
    }

    /**
     * @return boolean
     */
    public function isStatus()
    {
        return $this->status;
    }

    /**
     * @param boolean $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * @param mixed $weight
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;
    }

    /**
     * @return mixed
     */
    public function getEquipment()
    {
        return $this->equipment;
    }

    /**
     * @param mixed $equipment
     */
    public function setEquipment($equipment)
    {
        $this->equipment = $equipment;
    }

    /**
     * @return string
     */
    public function getCharacteristics()
    {
        return $this->characteristics;
    }

    /**
     * @param string $characteristics
     */
    public function setCharacteristics($characteristics)
    {
        $this->characteristics = $characteristics;
    }

    /**
     * @return Page
     */
    public function getPage()
    {
        return $this->page;
    }

    /**
     * @param Page $page
     */
    public function setPage($page)
    {
        $this->page = $page;
    }

}


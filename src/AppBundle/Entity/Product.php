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
     * @ORM\Column(name="vendorCode", type="string", length=255, nullable=true)
     */
    private $code;

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
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="shortDescription", type="text", nullable=true)
     */
    private $shortDescription;

    /**
     * @var float
     *
     * @ORM\Column(name="price", type="decimal", precision=10, scale=2)
     */
    private $price;

    /**
     * @var float
     *
     * @ORM\Column(name="priceUsd", type="decimal", precision=10, scale=2, nullable=true)
     */
    private $priceUsd;

    /**
     * @var float
     *
     * @ORM\Column(name="priceSale", type="decimal", precision=10, scale=2, nullable=true)
     */
    private $priceSale;

    /**
     * @var float
     *
     * @ORM\Column(name="priceWholesale", type="decimal", precision=10, scale=2, nullable=true)
     */
    private $priceWholesale;

    /**
     * @var boolean
     *
     * @ORM\Column(name="status", type="integer")
     */
    private $status = 0;


    /**
     * @var float
     *
     * @ORM\Column(name="weight", type="decimal", precision=10, scale=2, nullable=true)
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

    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=true)
     */
    private $metaTitle;

    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=true)
     */
    private $metaKeyword;

    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=true)
     */
    private $metaDescription;


    public function __construct()
    {
        $this->price = 0;
        $this->image = array();
        $this->images = new ArrayCollection();
        $this->equipment = new ArrayCollection();
        $this->status = 0;
        $this->enabled = true;
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
     * Set description
     *
     * @param string $description
     *
     * @return Product
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
     * @return integer
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param integer $status
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

    /**
     * @return string
     */
    public function getShortDescription()
    {
        return $this->shortDescription;
    }

    /**
     * @param string $shortDescription
     */
    public function setShortDescription($shortDescription)
    {
        $this->shortDescription = $shortDescription;
    }

    /**
     * @return string
     */
    public function getMetaTitle()
    {
        return $this->metaTitle;
    }

    /**
     * @param string $metaTitle
     */
    public function setMetaTitle($metaTitle)
    {
        $this->metaTitle = $metaTitle;
    }

    /**
     * @return string
     */
    public function getMetaKeyword()
    {
        return $this->metaKeyword;
    }

    /**
     * @param string $metaKeyword
     */
    public function setMetaKeyword($metaKeyword)
    {
        $this->metaKeyword = $metaKeyword;
    }

    /**
     * @return string
     */
    public function getMetaDescription()
    {
        return $this->metaDescription;
    }

    /**
     * @param string $metaDescription
     */
    public function setMetaDescription($metaDescription)
    {
        $this->metaDescription = $metaDescription;
    }

    /**
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param string $code
     */
    public function setCode($code)
    {
        $this->code = $code;
    }
    
    
    

}


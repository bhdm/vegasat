<?php
/**
 * Created by PhpStorm.
 * User: maxim
 * Date: 26.12.15
 * Time: 13:42
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 *
 * @ORM\Table(name="product_category")
 * @ORM\Entity()
 */
class ProductCategory extends BaseEntity
{
    /**
     *
     */
    private $product;

    /**
     *
     */
    private $category;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $metaTitle;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $metaDesc;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $metaKeys;

    /**
     * @return mixed
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * @param mixed $product
     */
    public function setProduct($product)
    {
        $this->product = $product;
    }

    /**
     * @return mixed
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param mixed $category
     */
    public function setCategory($category)
    {
        $this->category = $category;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getMetaTitle()
    {
        return $this->metaTitle;
    }

    /**
     * @param mixed $metaTitle
     */
    public function setMetaTitle($metaTitle)
    {
        $this->metaTitle = $metaTitle;
    }

    /**
     * @return mixed
     */
    public function getMetaDesc()
    {
        return $this->metaDesc;
    }

    /**
     * @param mixed $metaDesc
     */
    public function setMetaDesc($metaDesc)
    {
        $this->metaDesc = $metaDesc;
    }

    /**
     * @return mixed
     */
    public function getMetaKeys()
    {
        return $this->metaKeys;
    }

    /**
     * @param mixed $metaKeys
     */
    public function setMetaKeys($metaKeys)
    {
        $this->metaKeys = $metaKeys;
    }

}
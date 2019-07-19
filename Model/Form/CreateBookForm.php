<?php
/**
 * Created by PhpStorm.
 * User: Anonimus
 * Date: 19.07.2019
 * Time: 6:42
 */

namespace Model\Form;


class CreateBookForm
{

    private $id;
    private $title;
    private $description;
    private $price;
    private $category;
    private $isActive;

    /**
     * CreateBookForm constructor.
     * @param $id
     * @param $title
     * @param $description
     * @param $price
     * @param $category
     * @param $isActive
     */
    public function __construct($title = null, $description = null, $price = null, $category = null, $isActive = null)
    {
        $this->title = $title;
        $this->description = $description;
        $this->price = $price;
        $this->category = $category;
        $this->isActive = $isActive;
    }

    public function isValid()
    {
        return !empty($this->title) && !empty($this->description) && !empty($this->price);
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return null
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param null $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return null
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param null $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return null
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param null $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @return null
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param null $category
     */
    public function setCategory($category)
    {
        $this->category = $category;
    }

    /**
     * @return null
     */
    public function getisActive()
    {
        return $this->isActive;
    }

    /**
     * @param null $isActive
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;
    }


}
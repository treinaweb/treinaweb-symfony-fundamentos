<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

class Task 
{
    /**
     * @ORM\Id
     * @ORM\GenerateValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", Length=100)
     */
    private $title;

    /**
     * @ORM\Column(type="string", Length=500)
     */
    private $description;

    /**
     * pegar valor do id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * pegar valor do title
     *
     * @return integer
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * setar valor no title
     *
     * @param int $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }
    
    /**
     * pegar valor do description
     *
     * @return integer
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * setar valor no description
     *
     * @param int $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }    
}
<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProductRepository")
 */
class Product
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Rest", inversedBy="products")
     */
    private $rest;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\KitchenType", inversedBy="products")
     */
    private $kitchen_type;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\ProductCat", inversedBy="products")
     */
    private $product_cat;

    /**
     * @ORM\Column(type="integer")
     */
    private $price;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getRest(): ?Rest
    {
        return $this->rest;
    }

    public function setRest(?Rest $rest): self
    {
        $this->rest = $rest;

        return $this;
    }

    public function getKitchenType(): ?KitchenType
    {
        return $this->kitchen_type;
    }

    public function setKitchenType(?KitchenType $kitchen_type): self
    {
        $this->kitchen_type = $kitchen_type;

        return $this;
    }

    public function getProductCat(): ?ProductCat
    {
        return $this->product_cat;
    }

    public function setProductCat(?ProductCat $product_cat): self
    {
        $this->product_cat = $product_cat;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): self
    {
        $this->price = $price;

        return $this;
    }
}

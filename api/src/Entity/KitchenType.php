<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\KitchenTypeRepository")
 */
class KitchenType
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
     * @ORM\OneToMany(targetEntity="App\Entity\Product", mappedBy="kitchen_type")
     */
    private $products;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Rest", mappedBy="kitchen_type")
     */
    private $rests;

    public function __construct()
    {
        $this->products = new ArrayCollection();
        $this->rests = new ArrayCollection();
    }

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

    /**
     * @return Collection|Product[]
     */
    public function getProducts(): Collection
    {
        return $this->products;
    }

    public function addProduct(Product $product): self
    {
        if (!$this->products->contains($product)) {
            $this->products[] = $product;
            $product->setKitchenType($this);
        }

        return $this;
    }

    public function removeProduct(Product $product): self
    {
        if ($this->products->contains($product)) {
            $this->products->removeElement($product);
            // set the owning side to null (unless already changed)
            if ($product->getKitchenType() === $this) {
                $product->setKitchenType(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Rest[]
     */
    public function getRests(): Collection
    {
        return $this->rests;
    }

    public function addRest(Rest $rest): self
    {
        if (!$this->rests->contains($rest)) {
            $this->rests[] = $rest;
            $rest->addKitchenType($this);
        }

        return $this;
    }

    public function removeRest(Rest $rest): self
    {
        if ($this->rests->contains($rest)) {
            $this->rests->removeElement($rest);
            $rest->removeKitchenType($this);
        }

        return $this;
    }
}

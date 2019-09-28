<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\RestRepository")
 */
class Rest
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
     * @ORM\ManyToMany(targetEntity="App\Entity\User", inversedBy="rests")
     */
    private $user;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\OrderEntity", mappedBy="rest")
     */
    private $orders;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\RestWorktime", mappedBy="rest")
     */
    private $restWorktimes;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Station", inversedBy="rests")
     */
    private $station;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Product", mappedBy="rest")
     */
    private $products;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\KitchenType", inversedBy="rests")
     */
    private $kitchen_type;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    public function __construct()
    {
        $this->user = new ArrayCollection();
        $this->orders = new ArrayCollection();
        $this->restWorktimes = new ArrayCollection();
        $this->station = new ArrayCollection();
        $this->products = new ArrayCollection();
        $this->kitchen_type = new ArrayCollection();
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
     * @return Collection|User[]
     */
    public function getUser(): Collection
    {
        return $this->user;
    }

    public function addUser(User $user): self
    {
        if (!$this->user->contains($user)) {
            $this->user[] = $user;
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->user->contains($user)) {
            $this->user->removeElement($user);
        }

        return $this;
    }

    /**
     * @return Collection|Order[]
     */
    public function getOrders(): Collection
    {
        return $this->orders;
    }

    public function addOrder(Order $order): self
    {
        if (!$this->orders->contains($order)) {
            $this->orders[] = $order;
            $order->setRest($this);
        }

        return $this;
    }

    public function removeOrder(Order $order): self
    {
        if ($this->orders->contains($order)) {
            $this->orders->removeElement($order);
            // set the owning side to null (unless already changed)
            if ($order->getRest() === $this) {
                $order->setRest(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|RestWorktime[]
     */
    public function getRestWorktimes(): Collection
    {
        return $this->restWorktimes;
    }

    public function addRestWorktime(RestWorktime $restWorktime): self
    {
        if (!$this->restWorktimes->contains($restWorktime)) {
            $this->restWorktimes[] = $restWorktime;
            $restWorktime->setRest($this);
        }

        return $this;
    }

    public function removeRestWorktime(RestWorktime $restWorktime): self
    {
        if ($this->restWorktimes->contains($restWorktime)) {
            $this->restWorktimes->removeElement($restWorktime);
            // set the owning side to null (unless already changed)
            if ($restWorktime->getRest() === $this) {
                $restWorktime->setRest(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Station[]
     */
    public function getStation(): Collection
    {
        return $this->station;
    }

    public function addStation(Station $station): self
    {
        if (!$this->station->contains($station)) {
            $this->station[] = $station;
        }

        return $this;
    }

    public function removeStation(Station $station): self
    {
        if ($this->station->contains($station)) {
            $this->station->removeElement($station);
        }

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
            $product->setRest($this);
        }

        return $this;
    }

    public function removeProduct(Product $product): self
    {
        if ($this->products->contains($product)) {
            $this->products->removeElement($product);
            // set the owning side to null (unless already changed)
            if ($product->getRest() === $this) {
                $product->setRest(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|KitchenType[]
     */
    public function getKitchenType(): Collection
    {
        return $this->kitchen_type;
    }

    public function addKitchenType(KitchenType $kitchenType): self
    {
        if (!$this->kitchen_type->contains($kitchenType)) {
            $this->kitchen_type[] = $kitchenType;
        }

        return $this;
    }

    public function removeKitchenType(KitchenType $kitchenType): self
    {
        if ($this->kitchen_type->contains($kitchenType)) {
            $this->kitchen_type->removeElement($kitchenType);
        }

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }
}

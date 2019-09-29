<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\OrderRepository")
 */
class OrderEntity
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="orders")
     */
    private $user;

    /**
     * @ORM\Column(type="integer")
     */
    private $arrival_time;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Rest", inversedBy="orders")
     */
    private $rest;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\OrderBasket", mappedBy="order_entity")
     */
    private $orderBaskets;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Station", inversedBy="orderEntities")
     */
    private $station;

    /**
     * @ORM\Column(type="integer")
     */
    private $train_id;

    /**
     * @ORM\Column(type="integer")
     */
    private $delivery_time;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $phone;

    public function __construct()
    {
        $this->orderBaskets = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getarrivalTime(): ?int
    {
        return $this->arrival_time;
    }

    public function setarrivalTime(int $arrival_time): self
    {
        $this->arrival_time = $arrival_time;

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

    /**
     * @return Collection|OrderBasket[]
     */
    public function getOrderBaskets(): Collection
    {
        return $this->orderBaskets;
    }

    public function addOrderBasket(OrderBasket $orderBasket): self
    {
        if (!$this->orderBaskets->contains($orderBasket)) {
            $this->orderBaskets[] = $orderBasket;
            $orderBasket->setOrderEntity($this);
        }

        return $this;
    }

    public function removeOrderBasket(OrderBasket $orderBasket): self
    {
        if ($this->orderBaskets->contains($orderBasket)) {
            $this->orderBaskets->removeElement($orderBasket);
            // set the owning side to null (unless already changed)
            if ($orderBasket->getOrderEntity() === $this) {
                $orderBasket->setOrderEntity(null);
            }
        }

        return $this;
    }

    public function getStation(): ?Station
    {
        return $this->station;
    }

    public function setStation(?Station $station): self
    {
        $this->station = $station;

        return $this;
    }

    public function getTrainId(): ?int
    {
        return $this->train_id;
    }

    public function setTrainId(int $train_id): self
    {
        $this->train_id = $train_id;

        return $this;
    }

    public function getDeliveryTime(): ?int
    {
        return $this->delivery_time;
    }

    public function setDeliveryTime(int $delivery_time): self
    {
        $this->delivery_time = $delivery_time;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }
}

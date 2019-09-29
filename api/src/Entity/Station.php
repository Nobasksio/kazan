<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\StationRepository")
 */
class Station
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
     * @ORM\OneToMany(targetEntity="App\Entity\RestWorktime", mappedBy="station")
     */
    private $restWorktimes;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Rest", mappedBy="station")
     */
    private $rests;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\TrainRoute", mappedBy="station")
     */
    private $trainRoutes;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\OrderEntity", mappedBy="station")
     */
    private $orderEntities;

    public function __construct()
    {
        $this->restWorktimes = new ArrayCollection();
        $this->rests = new ArrayCollection();
        $this->trainRoutes = new ArrayCollection();
        $this->orderEntities = new ArrayCollection();
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
            $restWorktime->setStation($this);
        }

        return $this;
    }

    public function removeRestWorktime(RestWorktime $restWorktime): self
    {
        if ($this->restWorktimes->contains($restWorktime)) {
            $this->restWorktimes->removeElement($restWorktime);
            // set the owning side to null (unless already changed)
            if ($restWorktime->getStation() === $this) {
                $restWorktime->setStation(null);
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
            $rest->addStation($this);
        }

        return $this;
    }

    public function removeRest(Rest $rest): self
    {
        if ($this->rests->contains($rest)) {
            $this->rests->removeElement($rest);
            $rest->removeStation($this);
        }

        return $this;
    }

    /**
     * @return Collection|TrainRoute[]
     */
    public function getTrainRoutes(): Collection
    {
        return $this->trainRoutes;
    }

    public function addTrainRoute(TrainRoute $trainRoute): self
    {
        if (!$this->trainRoutes->contains($trainRoute)) {
            $this->trainRoutes[] = $trainRoute;
            $trainRoute->setStation($this);
        }

        return $this;
    }

    public function removeTrainRoute(TrainRoute $trainRoute): self
    {
        if ($this->trainRoutes->contains($trainRoute)) {
            $this->trainRoutes->removeElement($trainRoute);
            // set the owning side to null (unless already changed)
            if ($trainRoute->getStation() === $this) {
                $trainRoute->setStation(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|OrderEntity[]
     */
    public function getOrderEntities(): Collection
    {
        return $this->orderEntities;
    }

    public function addOrderEntity(OrderEntity $orderEntity): self
    {
        if (!$this->orderEntities->contains($orderEntity)) {
            $this->orderEntities[] = $orderEntity;
            $orderEntity->setStation($this);
        }

        return $this;
    }

    public function removeOrderEntity(OrderEntity $orderEntity): self
    {
        if ($this->orderEntities->contains($orderEntity)) {
            $this->orderEntities->removeElement($orderEntity);
            // set the owning side to null (unless already changed)
            if ($orderEntity->getStation() === $this) {
                $orderEntity->setStation(null);
            }
        }

        return $this;
    }
}

<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TrainRepository")
 */
class Train
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
     * @ORM\OneToMany(targetEntity="App\Entity\TrainRoute", mappedBy="train")
     */
    private $trainRoutes;

    public function __construct()
    {
        $this->trainRoutes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getname(): ?string
    {
        return $this->name;
    }

    public function setname(string $name): self
    {
        $this->name = $name;

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
            $trainRoute->setTrain($this);
        }

        return $this;
    }

    public function removeTrainRoute(TrainRoute $trainRoute): self
    {
        if ($this->trainRoutes->contains($trainRoute)) {
            $this->trainRoutes->removeElement($trainRoute);
            // set the owning side to null (unless already changed)
            if ($trainRoute->getTrain() === $this) {
                $trainRoute->setTrain(null);
            }
        }

        return $this;
    }
}

<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TrainRouteRepository")
 */
class TrainRoute
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Train", inversedBy="trainRoutes")
     */
    private $train;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Station", inversedBy="trainRoutes")
     */
    private $station;

    /**
     * @ORM\Column(type="integer")
     */
    private $arrival_time;

    /**
     * @ORM\Column(type="integer")
     */
    private $departure_time;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTrain(): ?Train
    {
        return $this->train;
    }

    public function setTrain(?Train $train): self
    {
        $this->train = $train;

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

    public function getArrivalTime(): ?int
    {
        return $this->arrival_time;
    }

    public function setArrivalTime(int $arrival_time): self
    {
        $this->arrival_time = $arrival_time;

        return $this;
    }

    public function getDepartureTime(): ?int
    {
        return $this->departure_time;
    }

    public function setDepartureTime(int $departure_time): self
    {
        $this->departure_time = $departure_time;

        return $this;
    }
}

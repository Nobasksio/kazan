<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\RestWorktimeRepository")
 */
class RestWorktime
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Rest", inversedBy="restWorktimes")
     */
    private $rest;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Station", inversedBy="restWorktimes")
     */
    private $station;

    /**
     * @ORM\Column(type="integer")
     */
    private $weekday;

    /**
     * @ORM\Column(type="integer")
     */
    private $time_from;

    /**
     * @ORM\Column(type="integer")
     */
    private $time_to;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getStation(): ?Station
    {
        return $this->station;
    }

    public function setStation(?Station $station): self
    {
        $this->station = $station;

        return $this;
    }

    public function getWeekday(): ?int
    {
        return $this->weekday;
    }

    public function setWeekday(int $weekday): self
    {
        $this->weekday = $weekday;

        return $this;
    }

    public function getTimeFrom(): ?int
    {
        return $this->time_from;
    }

    public function setTimeFrom(int $time_from): self
    {
        $this->time_from = $time_from;

        return $this;
    }

    public function getTimeTo(): ?int
    {
        return $this->time_to;
    }

    public function setTimeTo(int $time_to): self
    {
        $this->time_to = $time_to;

        return $this;
    }
}

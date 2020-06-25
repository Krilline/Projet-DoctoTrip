<?php

namespace App\Entity;

use App\Repository\AirLinesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AirLinesRepository::class)
 */
class AirLines
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $departure_date;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $departure_country;

    /**
     * @ORM\Column(type="date")
     */
    private $arrival_date;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $arrival_country;

    /**
     * @ORM\OneToOne(targetEntity=User::class, inversedBy="airLines", cascade={"persist", "remove"})
     */
    private $user;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDepartureDate(): ?\DateTimeInterface
    {
        return $this->departure_date;
    }

    public function setDepartureDate(\DateTimeInterface $departure_date): self
    {
        $this->departure_date = $departure_date;

        return $this;
    }

    public function getDepartureCountry(): ?string
    {
        return $this->departure_country;
    }

    public function setDepartureCountry(string $departure_country): self
    {
        $this->departure_country = $departure_country;

        return $this;
    }

    public function getArrivalDate(): ?\DateTimeInterface
    {
        return $this->arrival_date;
    }

    public function setArrivalDate(\DateTimeInterface $arrival_date): self
    {
        $this->arrival_date = $arrival_date;

        return $this;
    }

    public function getArrivalCountry(): ?string
    {
        return $this->arrival_country;
    }

    public function setArrivalCountry(string $arrival_country): self
    {
        $this->arrival_country = $arrival_country;

        return $this;
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

}

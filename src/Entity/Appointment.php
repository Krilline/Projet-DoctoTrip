<?php

namespace App\Entity;

use App\Repository\AppointmentRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AppointmentRepository::class)
 */
class Appointment
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
    private $app_date;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAppDate(): ?\DateTimeInterface
    {
        return $this->app_date;
    }

    public function setAppDate(\DateTimeInterface $app_date): self
    {
        $this->app_date = $app_date;

        return $this;
    }
}

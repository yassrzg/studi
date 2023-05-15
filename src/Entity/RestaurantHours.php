<?php

namespace App\Entity;

use App\Repository\RestaurantHoursRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RestaurantHoursRepository::class)]
class RestaurantHours
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $jours = null;

    #[ORM\Column(type: Types::TIME_MUTABLE,nullable: true)]
    private ?\DateTimeInterface $openHours = null;

    #[ORM\Column(type: Types::TIME_MUTABLE,nullable: true)]
    private ?\DateTimeInterface $closeHours = null;

    #[ORM\Column(type: Types::TIME_MUTABLE,nullable: true)]
    private ?\DateTimeInterface $open_hours_soir = null;

    #[ORM\Column(type: Types::TIME_MUTABLE,nullable: true)]
    private ?\DateTimeInterface $close_hours_soir = null;

    #[ORM\Column]
    private ?int $IntervalleHoraire = null;

    #[ORM\Column(nullable: true)]
    private ?int $NombreCouvertMax = null;

    #[ORM\OneToOne(mappedBy: 'CouvertRestant', cascade: ['persist', 'remove'])]
    private ?Reservation $reservation = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getJours(): ?string
    {
        return $this->jours;
    }

    public function setJours(string $jours): self
    {
        $this->jours = $jours;

        return $this;
    }

    public function getOpenHours(): ?\DateTimeInterface
    {
        return $this->openHours;
    }

    public function setOpenHours(\DateTimeInterface $openHours): self
    {
        $this->openHours = $openHours;

        return $this;
    }

    public function getCloseHours(): ?\DateTimeInterface
    {
        return $this->closeHours;
    }

    public function setCloseHours(\DateTimeInterface $closeHours): self
    {
        $this->closeHours = $closeHours;

        return $this;
    }

    public function getOpenHoursSoir(): ?\DateTimeInterface
    {
        return $this->open_hours_soir;
    }

    public function setOpenHoursSoir(\DateTimeInterface $open_hours_soir): self
    {
        $this->open_hours_soir = $open_hours_soir;

        return $this;
    }

    public function getCloseHoursSoir(): ?\DateTimeInterface
    {
        return $this->close_hours_soir;
    }

    public function setCloseHoursSoir(\DateTimeInterface $close_hours_soir): self
    {
        $this->close_hours_soir = $close_hours_soir;

        return $this;
    }

    public function getIntervalleHoraire(): ?int
    {
        return $this->IntervalleHoraire;
    }

    public function setIntervalleHoraire(int $IntervalleHoraire): self
    {
        $this->IntervalleHoraire = $IntervalleHoraire;

        return $this;
    }

    public function getNombreCouvertMax(): ?int
    {
        return $this->NombreCouvertMax;
    }

    public function setNombreCouvertMax(?int $NombreCouvertMax): self
    {
        $this->NombreCouvertMax = $NombreCouvertMax;

        return $this;
    }

    public function getReservation(): ?Reservation
    {
        return $this->reservation;
    }

    public function setReservation(?Reservation $reservation): self
    {
        // unset the owning side of the relation if necessary
        if ($reservation === null && $this->reservation !== null) {
            $this->reservation->setCouvertRestant(null);
        }

        // set the owning side of the relation if necessary
        if ($reservation !== null && $reservation->getCouvertRestant() !== $this) {
            $reservation->setCouvertRestant($this);
        }

        $this->reservation = $reservation;

        return $this;
    }


}

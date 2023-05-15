<?php

namespace App\Entity;

use App\Repository\CreneauxRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CreneauxRepository::class)]
class Creneaux
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $Date = null;

    #[ORM\Column]
    private ?int $NombreCouvert = null;

    #[ORM\OneToOne(inversedBy: 'creneau', cascade: ['persist', 'remove'])]
    private ?Reservation $Reservation = null;

    #[ORM\Column]
    private ?int $NombreCouvertRestant = null;



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->Date;
    }

    public function setDate(\DateTimeInterface $Date): self
    {
        $this->Date = $Date;

        return $this;
    }

    public function getNombreCouvert(): ?int
    {
        return $this->NombreCouvert;
    }

    public function setNombreCouvert(int $NombreCouvert): self
    {
        $this->NombreCouvert = $NombreCouvert;

        return $this;
    }

    public function getReservation(): ?Reservation
    {
        return $this->Reservation;
    }

    public function setReservation(?Reservation $Reservation): self
    {
        $this->Reservation = $Reservation;

        return $this;
    }

    public function getNombreCouvertRestant(): ?int
    {
        return $this->NombreCouvertRestant;
    }

    public function setNombreCouvertRestant(int $NombreCouvertRestant): self
    {
        $this->NombreCouvertRestant = $NombreCouvertRestant;

        return $this;
    }



}

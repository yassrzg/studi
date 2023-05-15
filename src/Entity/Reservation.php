<?php

namespace App\Entity;

use App\Repository\ReservationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReservationRepository::class)]
class Reservation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;



    #[ORM\Column]
    private ?int $couverts = null;

    #[ORM\ManyToMany(targetEntity: Allergie::class, inversedBy: 'reservations')]
    private Collection $allergie;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $Date = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $Heure = null;

    #[ORM\OneToOne(inversedBy: 'reservation', cascade: ['persist', 'remove'])]
    private ?RestaurantHours $CouvertRestant = null;


    #[ORM\OneToOne(mappedBy: 'Reservation', cascade: ['persist', 'remove'])]
    private ?Creneaux $creneau = null;

    #[ORM\Column(type: "simple_array", nullable: true)]
    private ?array $Allergie = null;

    #[ORM\ManyToMany(targetEntity: User::class, mappedBy: 'Reservation')]
    private Collection $users;

    #[ORM\Column(length: 255)]
    private ?string $lastname = null;





    public function __construct()
    {
        $this->allergie = new ArrayCollection();
        $this->users = new ArrayCollection();
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

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }



    public function getCouverts(): ?int
    {
        return $this->couverts;
    }

    public function setCouverts(int $couverts): self
    {
        $this->couverts = $couverts;

        return $this;
    }

    /**
     * @return Collection<int, Allergie>
     */
    public function getAllergie(): Collection
    {
        return $this->allergie;
    }

    public function addAllergie(Allergie $allergie): self
    {
        if (!$this->allergie->contains($allergie)) {
            $this->allergie->add($allergie);
        }

        return $this;
    }

    public function removeAllergie(Allergie $allergie): self
    {
        $this->allergie->removeElement($allergie);

        return $this;
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

    public function getHeure(): ?\DateTimeInterface
    {
        return $this->Heure;
    }

    public function setHeure(\DateTimeInterface $Heure): self
    {
        $this->Heure = $Heure;

        return $this;
    }

    public function getCouvertRestant(): ?RestaurantHours
    {
        return $this->CouvertRestant;
    }

    public function setCouvertRestant(?RestaurantHours $CouvertRestant): self
    {
        $this->CouvertRestant = $CouvertRestant;

        return $this;
    }

    public function getCreneaux(): ?Creneaux
    {
        return $this->creneaux;
    }

    public function setCreneaux(?Creneaux $creneaux): self
    {
        // unset the owning side of the relation if necessary
        if ($creneaux === null && $this->creneaux !== null) {
            $this->creneaux->setCreneau(null);
        }

        // set the owning side of the relation if necessary
        if ($creneaux !== null && $creneaux->getCreneau() !== $this) {
            $creneaux->setCreneau($this);
        }

        $this->creneaux = $creneaux;

        return $this;
    }

    public function getCreneau(): ?Creneaux
    {
        return $this->creneau;
    }

    public function setCreneau(?Creneaux $creneau): self
    {
        // unset the owning side of the relation if necessary
        if ($creneau === null && $this->creneau !== null) {
            $this->creneau->setReservation(null);
        }

        // set the owning side of the relation if necessary
        if ($creneau !== null && $creneau->getReservation() !== $this) {
            $creneau->setReservation($this);
        }

        $this->creneau = $creneau;

        return $this;
    }

    public function setAllergie(?array $Allergie): self
    {
        $this->Allergie = $Allergie;
        return $this;
    }



    /**
     * @return Collection<int, User>
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(User $user): self
    {
        if (!$this->users->contains($user)) {
            $this->users->add($user);
            $user->addReservation($this);
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->users->removeElement($user)) {
            $user->removeReservation($this);
        }

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }



}

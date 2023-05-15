<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: UserRepository::class)]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 180, unique: true)]
    private ?string $email = null;

    #[ORM\Column]
    private array $roles = [];

    /**
     * @var string The hashed password
     */
    #[ORM\Column]
    private ?string $password = null;

    #[ORM\Column(length: 255)]
    private ?string $firstname = null;

    #[ORM\Column(length: 255)]
    private ?string $lastname = null;


    #[ORM\ManyToMany(targetEntity: Allergie::class, inversedBy: 'users')]
    private Collection $alergieType;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Allergie = null;

    #[ORM\ManyToMany(targetEntity: Reservation::class, inversedBy: 'users')]
    private Collection $Reservation;





    public function __construct()
    {
       // $this->allergietype = new ArrayCollection();
        $this->alergieType = new ArrayCollection();
        $this->Reservation = new ArrayCollection();

    }



    public function getId(): ?int
    {
        return $this->id;
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

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

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



    /**
     * @return Collection<int, Allergie>
     */
    public function getAlergieType(): Collection
    {
        return $this->alergieType;
    }

    public function addAlergieType(Allergie $alergieType): self
    {
        if (!$this->alergieType->contains($alergieType)) {
            $this->alergieType->add($alergieType);
        }

        return $this;
    }

    public function removeAlergieType(Allergie $alergieType): self
    {
        $this->alergieType->removeElement($alergieType);

        return $this;
    }

    public function getAllergie(): ?string
    {
        return $this->Allergie;
    }

    public function setAllergie(?string $Allergie): self
    {
        $this->Allergie = $Allergie;

        return $this;
    }

    /**
     * @return Collection<int, Reservation>
     */
    public function getReservation(): Collection
    {
        return $this->Reservation;
    }

    public function addReservation(Reservation $reservation): self
    {
        if (!$this->Reservation->contains($reservation)) {
            $this->Reservation->add($reservation);
        }

        return $this;
    }

    public function removeReservation(Reservation $reservation): self
    {
        $this->Reservation->removeElement($reservation);

        return $this;
    }








}

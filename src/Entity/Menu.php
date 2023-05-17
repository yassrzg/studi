<?php

namespace App\Entity;

use App\Repository\MenuRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MenuRepository::class)]
class Menu
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $titre = null;

    #[ORM\OneToMany(mappedBy: 'menu', targetEntity: NosProduits::class)]
    private Collection $formules;

    public function __construct()
    {
        $this->formules = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * @return Collection<int, NosProduits>
     */
    public function getFormules(): Collection
    {
        return $this->formules;
    }

    public function addFormule(NosProduits $formule): self
    {
        if (!$this->formules->contains($formule)) {
            $this->formules->add($formule);
            $formule->setMenu($this);
        }

        return $this;
    }

    public function removeFormule(NosProduits $formule): self
    {
        if ($this->formules->removeElement($formule)) {
            // set the owning side to null (unless already changed)
            if ($formule->getMenu() === $this) {
                $formule->setMenu(null);
            }
        }

        return $this;
    }
    public function __toString()
    {
        return $this->titre;
    }
}

<?php

namespace App\Entity;

use App\Repository\CategorieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategorieRepository::class)]
class Categorie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\OneToMany(mappedBy: 'category', targetEntity: NosProduits::class)]
    private Collection $nosProduits;

    public function __construct()
    {
        $this->nosProduits = new ArrayCollection();
    }

    public function __toString() {
        return $this->getName();
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

    /**
     * @return Collection<int, NosProduits>
     */
    public function getNosProduits(): Collection
    {
        return $this->nosProduits;
    }

    public function addNosProduit(NosProduits $nosProduit): self
    {
        if (!$this->nosProduits->contains($nosProduit)) {
            $this->nosProduits->add($nosProduit);
            $nosProduit->setCategory($this);
        }

        return $this;
    }

    public function removeNosProduit(NosProduits $nosProduit): self
    {
        if ($this->nosProduits->removeElement($nosProduit)) {
            // set the owning side to null (unless already changed)
            if ($nosProduit->getCategory() === $this) {
                $nosProduit->setCategory(null);
            }
        }

        return $this;
    }
}

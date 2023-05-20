<?php

namespace App\Entity;

use App\Repository\FooterRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FooterRepository::class)]
class Footer
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;


    #[ORM\Column(length: 5000, nullable: true)]
    private ?string $Description = null;

    #[ORM\Column(length: 1000, nullable: true)]
    private ?string $cgu = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $cguImage = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $descriptionImage = null;

    public function getId(): ?int
    {
        return $this->id;
    }


    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(?string $Description): self
    {
        $this->Description = $Description;

        return $this;
    }

    public function getCgu(): ?string
    {
        return $this->cgu;
    }

    public function setCgu(?string $cgu): self
    {
        $this->cgu = $cgu;

        return $this;
    }

    public function getCguImage(): ?string
    {
        return $this->cguImage;
    }

    public function setCguImage(?string $cguImage): self
    {
        $this->cguImage = $cguImage;

        return $this;
    }

    public function getDescriptionImage(): ?string
    {
        return $this->descriptionImage;
    }

    public function setDescriptionImage(?string $descriptionImage): self
    {
        $this->descriptionImage = $descriptionImage;

        return $this;
    }
}

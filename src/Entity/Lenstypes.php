<?php

namespace App\Entity;

use App\Repository\LenstypesRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LenstypesRepository::class)]
class Lenstypes
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $lentsTypeName = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLentsTypeName(): ?string
    {
        return $this->lentsTypeName;
    }

    public function setLentsTypeName(string $lentsTypeName): static
    {
        $this->lentsTypeName = $lentsTypeName;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }
}

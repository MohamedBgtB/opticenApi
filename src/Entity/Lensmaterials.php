<?php

namespace App\Entity;

use App\Repository\LensmaterialsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LensmaterialsRepository::class)]
class Lensmaterials
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $materialName = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 4, scale: 2)]
    private ?string $refractiveIndex = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 4, scale: 0)]
    private ?string $density = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 4, scale: 0)]
    private ?string $abbeValue = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMaterialName(): ?string
    {
        return $this->materialName;
    }

    public function setMaterialName(?string $materialName): static
    {
        $this->materialName = $materialName;

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

    public function getRefractiveIndex(): ?string
    {
        return $this->refractiveIndex;
    }

    public function setRefractiveIndex(string $refractiveIndex): static
    {
        $this->refractiveIndex = $refractiveIndex;

        return $this;
    }

    public function getDensity(): ?string
    {
        return $this->density;
    }

    public function setDensity(string $density): static
    {
        $this->density = $density;

        return $this;
    }

    public function getAbbeValue(): ?string
    {
        return $this->abbeValue;
    }

    public function setAbbeValue(string $abbeValue): static
    {
        $this->abbeValue = $abbeValue;

        return $this;
    }
}

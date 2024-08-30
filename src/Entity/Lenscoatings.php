<?php

namespace App\Entity;

use App\Repository\LenscoatingsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LenscoatingsRepository::class)]
class Lenscoatings
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $coatingName = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $additionalProperties = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCoatingName(): ?string
    {
        return $this->coatingName;
    }

    public function setCoatingName(string $coatingName): static
    {
        $this->coatingName = $coatingName;

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

    public function getAdditionalProperties(): ?string
    {
        return $this->additionalProperties;
    }

    public function setAdditionalProperties(?string $additionalProperties): static
    {
        $this->additionalProperties = $additionalProperties;

        return $this;
    }
}

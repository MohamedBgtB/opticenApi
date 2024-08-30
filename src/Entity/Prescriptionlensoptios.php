<?php

namespace App\Entity;

use App\Repository\PrescriptionlensoptiosRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PrescriptionlensoptiosRepository::class)]
class Prescriptionlensoptios
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $optionName = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $additionalPropertues = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOptionName(): ?string
    {
        return $this->optionName;
    }

    public function setOptionName(string $optionName): static
    {
        $this->optionName = $optionName;

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

    public function getAdditionalPropertues(): ?string
    {
        return $this->additionalPropertues;
    }

    public function setAdditionalPropertues(?string $additionalPropertues): static
    {
        $this->additionalPropertues = $additionalPropertues;

        return $this;
    }
}

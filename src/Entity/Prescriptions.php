<?php

namespace App\Entity;

use App\Repository\PrescriptionsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PrescriptionsRepository::class)]
class Prescriptions
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'id_prescriptions')]
    private ?patients $Id_patient = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $Date_de_prescription = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 5, scale: 0, nullable: true)]
    private ?string $OD_sphere = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 5, scale: 0, nullable: true)]
    private ?string $OD_cylindre = null;

    #[ORM\Column(nullable: true)]
    private ?int $OD_axe = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 5, scale: 0, nullable: true)]
    private ?string $OD_addition = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 5, scale: 0, nullable: true)]
    private ?string $OG_sphere = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 5, scale: 0, nullable: true)]
    private ?string $OG_cylinder = null;

    #[ORM\Column(nullable: true)]
    private ?int $OG_axe = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 5, scale: 0, nullable: true)]
    private ?string $OG_addition = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdPatient(): ?patients
    {
        return $this->Id_patient;
    }

    public function setIdPatient(?patients $Id_patient): static
    {
        $this->Id_patient = $Id_patient;

        return $this;
    }

    public function getDateDePrescription(): ?\DateTimeImmutable
    {
        return $this->Date_de_prescription;
    }

    public function setDateDePrescription(\DateTimeImmutable $Date_de_prescription): static
    {
        $this->Date_de_prescription = $Date_de_prescription;

        return $this;
    }

    public function getODSphere(): ?string
    {
        return $this->OD_sphere;
    }

    public function setODSphere(?string $OD_sphere): static
    {
        $this->OD_sphere = $OD_sphere;

        return $this;
    }

    public function getODCylindre(): ?string
    {
        return $this->OD_cylindre;
    }

    public function setODCylindre(?string $OD_cylindre): static
    {
        $this->OD_cylindre = $OD_cylindre;

        return $this;
    }

    public function getODAxe(): ?int
    {
        return $this->OD_axe;
    }

    public function setODAxe(?int $OD_axe): static
    {
        $this->OD_axe = $OD_axe;

        return $this;
    }

    public function getODAddition(): ?string
    {
        return $this->OD_addition;
    }

    public function setODAddition(?string $OD_addition): static
    {
        $this->OD_addition = $OD_addition;

        return $this;
    }

    public function getOGSphere(): ?string
    {
        return $this->OG_sphere;
    }

    public function setOGSphere(?string $OG_sphere): static
    {
        $this->OG_sphere = $OG_sphere;

        return $this;
    }

    public function getOGCylinder(): ?string
    {
        return $this->OG_cylinder;
    }

    public function setOGCylinder(?string $OG_cylinder): static
    {
        $this->OG_cylinder = $OG_cylinder;

        return $this;
    }

    public function getOGAxe(): ?int
    {
        return $this->OG_axe;
    }

    public function setOGAxe(?int $OG_axe): static
    {
        $this->OG_axe = $OG_axe;

        return $this;
    }

    public function getOGAddition(): ?string
    {
        return $this->OG_addition;
    }

    public function setOGAddition(?string $OG_addition): static
    {
        $this->OG_addition = $OG_addition;

        return $this;
    }
}

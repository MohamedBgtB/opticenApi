<?php

namespace App\Entity;

use App\Repository\FournisseursRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FournisseursRepository::class)]
class Fournisseurs
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $nom_du_fournisseur = null;

    #[ORM\Column(length: 255)]
    private ?string $adresse_du_fournisseur = null;

    #[ORM\Column(length: 15, nullable: true)]
    private ?string $numero_de_telephone_du_fournisseur = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomDuFournisseur(): ?string
    {
        return $this->nom_du_fournisseur;
    }

    public function setNomDuFournisseur(string $nom_du_fournisseur): static
    {
        $this->nom_du_fournisseur = $nom_du_fournisseur;

        return $this;
    }

    public function getAdresseDuFournisseur(): ?string
    {
        return $this->adresse_du_fournisseur;
    }

    public function setAdresseDuFournisseur(string $adresse_du_fournisseur): static
    {
        $this->adresse_du_fournisseur = $adresse_du_fournisseur;

        return $this;
    }

    public function getNumeroDeTelephoneDuFournisseur(): ?string
    {
        return $this->numero_de_telephone_du_fournisseur;
    }

    public function setNumeroDeTelephoneDuFournisseur(?string $numero_de_telephone_du_fournisseur): static
    {
        $this->numero_de_telephone_du_fournisseur = $numero_de_telephone_du_fournisseur;

        return $this;
    }
}

<?php

namespace App\Entity;

use App\Repository\VentesRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VentesRepository::class)]
class Ventes
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'id_vente')]
    private ?produits $id_produit = null;

    #[ORM\ManyToOne(inversedBy: 'id_patient')]
    private ?patients $id_patient = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $date_de_vente = null;

    #[ORM\Column]
    private ?int $quantite_vendue = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 0)]
    private ?string $prix_unitaire = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 0)]
    private ?string $total_de_la_vente = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdProduit(): ?produits
    {
        return $this->id_produit;
    }

    public function setIdProduit(?produits $id_produit): static
    {
        $this->id_produit = $id_produit;

        return $this;
    }

    public function getIdPatient(): ?patients
    {
        return $this->id_patient;
    }

    public function setIdPatient(?patients $id_patient): static
    {
        $this->id_patient = $id_patient;

        return $this;
    }

    public function getDateDeVente(): ?\DateTimeImmutable
    {
        return $this->date_de_vente;
    }

    public function setDateDeVente(\DateTimeImmutable $date_de_vente): static
    {
        $this->date_de_vente = $date_de_vente;

        return $this;
    }

    public function getQuantiteVendue(): ?int
    {
        return $this->quantite_vendue;
    }

    public function setQuantiteVendue(int $quantite_vendue): static
    {
        $this->quantite_vendue = $quantite_vendue;

        return $this;
    }

    public function getPrixUnitaire(): ?string
    {
        return $this->prix_unitaire;
    }

    public function setPrixUnitaire(string $prix_unitaire): static
    {
        $this->prix_unitaire = $prix_unitaire;

        return $this;
    }

    public function getTotalDeLaVente(): ?string
    {
        return $this->total_de_la_vente;
    }

    public function setTotalDeLaVente(string $total_de_la_vente): static
    {
        $this->total_de_la_vente = $total_de_la_vente;

        return $this;
    }
}

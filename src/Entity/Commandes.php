<?php

namespace App\Entity;

use App\Repository\CommandesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CommandesRepository::class)]
class Commandes
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $Id_fournisseur = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $Date_de_commande = null;

    #[ORM\ManyToOne(inversedBy: 'commandes')]
    private ?Posts $Id_produit = null;

    #[ORM\Column]
    private ?int $Quantite_commend = null;

    #[ORM\Column]
    private ?float $prix_unitaire = null;

    #[ORM\Column]
    private ?float $Total_de_la_commande = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdFournisseur(): ?int
    {
        return $this->Id_fournisseur;
    }

    public function setIdFournisseur(int $Id_fournisseur): static
    {
        $this->Id_fournisseur = $Id_fournisseur;

        return $this;
    }

    public function getDateDeCommande(): ?\DateTimeImmutable
    {
        return $this->Date_de_commande;
    }

    public function setDateDeCommande(\DateTimeImmutable $Date_de_commande): static
    {
        $this->Date_de_commande = $Date_de_commande;

        return $this;
    }

    public function getIdProduit(): ?Posts
    {
        return $this->Id_produit;
    }

    public function setIdProduit(?Posts $Id_produit): static
    {
        $this->Id_produit = $Id_produit;

        return $this;
    }

    public function getQuantiteCommend(): ?int
    {
        return $this->Quantite_commend;
    }

    public function setQuantiteCommend(int $Quantite_commend): static
    {
        $this->Quantite_commend = $Quantite_commend;

        return $this;
    }

    public function getPrixUnitaire(): ?float
    {
        return $this->prix_unitaire;
    }

    public function setPrixUnitaire(float $prix_unitaire): static
    {
        $this->prix_unitaire = $prix_unitaire;

        return $this;
    }

    public function getTotalDeLaCommande(): ?float
    {
        return $this->Total_de_la_commande;
    }

    public function setTotalDeLaCommande(float $Total_de_la_commande): static
    {
        $this->Total_de_la_commande = $Total_de_la_commande;

        return $this;
    }
}

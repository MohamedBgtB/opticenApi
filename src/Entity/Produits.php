<?php

namespace App\Entity;

use App\Repository\ProduitsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProduitsRepository::class)]
class Produits
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $nom_du_produit = null;

    #[ORM\Column(length: 50)]
    private ?string $type_de_produit = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $marque = null;

    #[ORM\Column]
    private ?int $quantite_en_stock = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 0)]
    private ?string $prix_achat = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 0)]
    private ?string $prix_vente = null;

    /**
     * @var Collection<int, Ventes>
     */
    #[ORM\OneToMany(targetEntity: Ventes::class, mappedBy: 'id_produit')]
    private Collection $id_vente;

    public function __construct()
    {
        $this->id_vente = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomDuProduit(): ?string
    {
        return $this->nom_du_produit;
    }

    public function setNomDuProduit(string $nom_du_produit): static
    {
        $this->nom_du_produit = $nom_du_produit;

        return $this;
    }

    public function getTypeDeProduit(): ?string
    {
        return $this->type_de_produit;
    }

    public function setTypeDeProduit(string $type_de_produit): static
    {
        $this->type_de_produit = $type_de_produit;

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

    public function getMarque(): ?string
    {
        return $this->marque;
    }

    public function setMarque(?string $marque): static
    {
        $this->marque = $marque;

        return $this;
    }

    public function getQuantiteEnStock(): ?int
    {
        return $this->quantite_en_stock;
    }

    public function setQuantiteEnStock(int $quantite_en_stock): static
    {
        $this->quantite_en_stock = $quantite_en_stock;

        return $this;
    }

    public function getPrixAchat(): ?string
    {
        return $this->prix_achat;
    }

    public function setPrixAchat(string $prix_achat): static
    {
        $this->prix_achat = $prix_achat;

        return $this;
    }

    public function getPrixVente(): ?string
    {
        return $this->prix_vente;
    }

    public function setPrixVente(string $prix_vente): static
    {
        $this->prix_vente = $prix_vente;

        return $this;
    }

    /**
     * @return Collection<int, Ventes>
     */
    public function getIdVente(): Collection
    {
        return $this->id_vente;
    }

    public function addIdVente(Ventes $idVente): static
    {
        if (!$this->id_vente->contains($idVente)) {
            $this->id_vente->add($idVente);
            $idVente->setIdProduit($this);
        }

        return $this;
    }

    public function removeIdVente(Ventes $idVente): static
    {
        if ($this->id_vente->removeElement($idVente)) {
            // set the owning side to null (unless already changed)
            if ($idVente->getIdProduit() === $this) {
                $idVente->setIdProduit(null);
            }
        }

        return $this;
    }
}

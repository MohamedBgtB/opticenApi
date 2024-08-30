<?php

namespace App\Entity;

use App\Repository\PatientsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PatientsRepository::class)]
class Patients
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $nom = null;

    #[ORM\Column(length: 100)]
    private ?string $prenom = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $adresse = null;

    #[ORM\Column(length: 15, nullable: true)]
    private ?string $numero_de_tele = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $date_de_naissance = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $historique_des_prescription = null;

    /**
     * @var Collection<int, Ventes>
     */
    #[ORM\OneToMany(targetEntity: Ventes::class, mappedBy: 'id_patient')]
    private Collection $id_patient;

    /**
     * @var Collection<int, Prescriptions>
     */
    #[ORM\OneToMany(targetEntity: Prescriptions::class, mappedBy: 'Id_patient')]
    private Collection $id_prescriptions;

    public function __construct()
    {
        $this->id_patient = new ArrayCollection();
        $this->id_prescriptions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): static
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(?string $adresse): static
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getNumeroDeTele(): ?string
    {
        return $this->numero_de_tele;
    }

    public function setNumeroDeTele(?string $numero_de_tele): static
    {
        $this->numero_de_tele = $numero_de_tele;

        return $this;
    }

    public function getDateDeNaissance(): ?\DateTimeImmutable
    {
        return $this->date_de_naissance;
    }

    public function setDateDeNaissance(?\DateTimeImmutable $date_de_naissance): static
    {
        $this->date_de_naissance = $date_de_naissance;

        return $this;
    }

    public function getHistoriqueDesPrescription(): ?string
    {
        return $this->historique_des_prescription;
    }

    public function setHistoriqueDesPrescription(?string $historique_des_prescription): static
    {
        $this->historique_des_prescription = $historique_des_prescription;

        return $this;
    }

    /**
     * @return Collection<int, Ventes>
     */
    public function getIdPatient(): Collection
    {
        return $this->id_patient;
    }

    public function addIdPatient(Ventes $idPatient): static
    {
        if (!$this->id_patient->contains($idPatient)) {
            $this->id_patient->add($idPatient);
            $idPatient->setIdPatient($this);
        }

        return $this;
    }

    public function removeIdPatient(Ventes $idPatient): static
    {
        if ($this->id_patient->removeElement($idPatient)) {
            // set the owning side to null (unless already changed)
            if ($idPatient->getIdPatient() === $this) {
                $idPatient->setIdPatient(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Prescriptions>
     */
    public function getIdPrescriptions(): Collection
    {
        return $this->id_prescriptions;
    }

    public function addIdPrescription(Prescriptions $idPrescription): static
    {
        if (!$this->id_prescriptions->contains($idPrescription)) {
            $this->id_prescriptions->add($idPrescription);
            $idPrescription->setIdPatient($this);
        }

        return $this;
    }

    public function removeIdPrescription(Prescriptions $idPrescription): static
    {
        if ($this->id_prescriptions->removeElement($idPrescription)) {
            // set the owning side to null (unless already changed)
            if ($idPrescription->getIdPatient() === $this) {
                $idPrescription->setIdPatient(null);
            }
        }

        return $this;
    }
}

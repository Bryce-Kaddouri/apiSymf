<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\FournisseurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FournisseurRepository::class)]
#[ApiResource]

class Fournisseur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $libelle = null;

    #[ORM\Column(length: 255)]
    private ?string $adrRue = null;

    #[ORM\Column(length: 5)]
    private ?string $adrCP = null;

    #[ORM\Column(length: 50)]
    private ?string $adrVille = null;

    #[ORM\Column(length: 10)]
    private ?string $numTel = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\OneToMany(mappedBy: 'idFournisseur', targetEntity: MatPrem::class)]
    private Collection $matPrems;

    public function __construct()
    {
        $this->matPrems = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    public function getAdrRue(): ?string
    {
        return $this->adrRue;
    }

    public function setAdrRue(string $adrRue): self
    {
        $this->adrRue = $adrRue;

        return $this;
    }

    public function getAdrCP(): ?string
    {
        return $this->adrCP;
    }

    public function setAdrCP(string $adrCP): self
    {
        $this->adrCP = $adrCP;

        return $this;
    }

    public function getAdrVille(): ?string
    {
        return $this->adrVille;
    }

    public function setAdrVille(string $adrVille): self
    {
        $this->adrVille = $adrVille;

        return $this;
    }

    public function getNumTel(): ?string
    {
        return $this->numTel;
    }

    public function setNumTel(string $numTel): self
    {
        $this->numTel = $numTel;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return Collection<int, MatPrem>
     */
    public function getMatPrems(): Collection
    {
        return $this->matPrems;
    }

    public function addMatPrem(MatPrem $matPrem): self
    {
        if (!$this->matPrems->contains($matPrem)) {
            $this->matPrems->add($matPrem);
            $matPrem->setIdFournisseur($this);
        }

        return $this;
    }

    public function removeMatPrem(MatPrem $matPrem): self
    {
        if ($this->matPrems->removeElement($matPrem)) {
            // set the owning side to null (unless already changed)
            if ($matPrem->getIdFournisseur() === $this) {
                $matPrem->setIdFournisseur(null);
            }
        }

        return $this;
    }
}

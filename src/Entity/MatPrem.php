<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\MatPremRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MatPremRepository::class)]
#[ApiResource]

class MatPrem
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $libelle = null;

    #[ORM\Column]
    private ?int $quantite = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2)]
    private ?string $prixHT = null;

    #[ORM\ManyToOne(inversedBy: 'matPrems')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Fournisseur $idFournisseur = null;

    #[ORM\ManyToOne(inversedBy: 'matPrems')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Unite $idUnite = null;

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

    public function getQuantite(): ?int
    {
        return $this->quantite;
    }

    public function setQuantite(int $quantite): self
    {
        $this->quantite = $quantite;

        return $this;
    }

    public function getPrixHT(): ?string
    {
        return $this->prixHT;
    }

    public function setPrixHT(string $prixHT): self
    {
        $this->prixHT = $prixHT;

        return $this;
    }

    public function getIdFournisseur(): ?Fournisseur
    {
        return $this->idFournisseur;
    }

    public function setIdFournisseur(?Fournisseur $idFournisseur): self
    {
        $this->idFournisseur = $idFournisseur;

        return $this;
    }

    public function getIdUnite(): ?Unite
    {
        return $this->idUnite;
    }

    public function setIdUnite(?Unite $idUnite): self
    {
        $this->idUnite = $idUnite;

        return $this;
    }
}

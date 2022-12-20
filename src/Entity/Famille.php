<?php

namespace App\Entity;
use ApiPlatform\Metadata\ApiResource;

use App\Repository\FamilleRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FamilleRepository::class)]
#[ApiResource]

class Famille
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $libelle = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 5, scale: 2)]
    private ?string $txTVA = null;

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

    public function getTxTVA(): ?string
    {
        return $this->txTVA;
    }

    public function setTxTVA(string $txTVA): self
    {
        $this->txTVA = $txTVA;

        return $this;
    }
}

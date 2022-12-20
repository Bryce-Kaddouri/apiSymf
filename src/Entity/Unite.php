<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\UniteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UniteRepository::class)]
#[ApiResource]

class Unite
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 20)]
    private ?string $libelle = null;

    #[ORM\Column]
    private ?int $type = null;

    #[ORM\OneToMany(mappedBy: 'idUnite', targetEntity: MatPrem::class)]
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

    public function getType(): ?int
    {
        return $this->type;
    }

    public function setType(int $type): self
    {
        $this->type = $type;

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
            $matPrem->setIdUnite($this);
        }

        return $this;
    }

    public function removeMatPrem(MatPrem $matPrem): self
    {
        if ($this->matPrems->removeElement($matPrem)) {
            // set the owning side to null (unless already changed)
            if ($matPrem->getIdUnite() === $this) {
                $matPrem->setIdUnite(null);
            }
        }

        return $this;
    }
}

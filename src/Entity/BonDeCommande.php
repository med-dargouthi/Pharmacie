<?php

namespace App\Entity;

use App\Repository\BonDeCommandeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BonDeCommandeRepository::class)]
class BonDeCommande
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $NumTel = null;

    /**
     * @var Collection<int, user>
     */
    #[ORM\OneToMany(targetEntity: user::class, mappedBy: 'bonDeCommande')]
    private Collection $idPharmacien;

    /**
     * @var Collection<int, LigneBonDeCommande>
     */
    #[ORM\OneToMany(targetEntity: LigneBonDeCommande::class, mappedBy: 'BonDeCommande')]
    private Collection $ligneBonDeCommandes;

    public function __construct()
    {
        $this->idPharmacien = new ArrayCollection();
        $this->ligneBonDeCommandes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumTel(): ?int
    {
        return $this->NumTel;
    }

    public function setNumTel(int $NumTel): static
    {
        $this->NumTel = $NumTel;

        return $this;
    }

    /**
     * @return Collection<int, user>
     */
    public function getIdPharmacien(): Collection
    {
        return $this->idPharmacien;
    }

    public function addIdPharmacien(user $idPharmacien): static
    {
        if (!$this->idPharmacien->contains($idPharmacien)) {
            $this->idPharmacien->add($idPharmacien);
            $idPharmacien->setBonDeCommande($this);
        }

        return $this;
    }

    public function removeIdPharmacien(user $idPharmacien): static
    {
        if ($this->idPharmacien->removeElement($idPharmacien)) {
            // set the owning side to null (unless already changed)
            if ($idPharmacien->getBonDeCommande() === $this) {
                $idPharmacien->setBonDeCommande(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, LigneBonDeCommande>
     */
    public function getLigneBonDeCommandes(): Collection
    {
        return $this->ligneBonDeCommandes;
    }

    public function addLigneBonDeCommande(LigneBonDeCommande $ligneBonDeCommande): static
    {
        if (!$this->ligneBonDeCommandes->contains($ligneBonDeCommande)) {
            $this->ligneBonDeCommandes->add($ligneBonDeCommande);
            $ligneBonDeCommande->setBonDeCommande($this);
        }

        return $this;
    }

    public function removeLigneBonDeCommande(LigneBonDeCommande $ligneBonDeCommande): static
    {
        if ($this->ligneBonDeCommandes->removeElement($ligneBonDeCommande)) {
            // set the owning side to null (unless already changed)
            if ($ligneBonDeCommande->getBonDeCommande() === $this) {
                $ligneBonDeCommande->setBonDeCommande(null);
            }
        }

        return $this;
    }
}

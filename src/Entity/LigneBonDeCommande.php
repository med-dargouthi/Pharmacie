<?php

namespace App\Entity;

use App\Repository\LigneBonDeCommandeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LigneBonDeCommandeRepository::class)]
class LigneBonDeCommande
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 20)]
    private ?string $email = null;

    #[ORM\Column]
    private ?int $numTel = null;

    #[ORM\ManyToOne(inversedBy: 'ligneBonDeCommandes')]
    private ?BonDeCommande $BonDeCommande = null;

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

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getNumTel(): ?int
    {
        return $this->numTel;
    }

    public function setNumTel(int $numTel): static
    {
        $this->numTel = $numTel;

        return $this;
    }

    public function getBonDeCommande(): ?BonDeCommande
    {
        return $this->BonDeCommande;
    }

    public function setBonDeCommande(?BonDeCommande $BonDeCommande): static
    {
        $this->BonDeCommande = $BonDeCommande;

        return $this;
    }
}

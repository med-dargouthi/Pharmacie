<?php

namespace App\Entity;

use App\Repository\LigneMedicamentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LigneMedicamentRepository::class)]
class LigneMedicament
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $quantite = null;

    #[ORM\Column]
    private ?int $numLigne = null;

    /**
     * @var Collection<int, Medicament>
     */
    #[ORM\ManyToMany(targetEntity: Medicament::class, inversedBy: 'ligneMedicaments')]
    private Collection $idMedicament;

    /**
     * @var Collection<int, Ordonnance>
     */
    #[ORM\OneToMany(targetEntity: Ordonnance::class, mappedBy: 'LigneMedicament')]
    private Collection $ordonnances;

    /**
     * @var Collection<int, Recu>
     */
    #[ORM\ManyToMany(targetEntity: Recu::class, mappedBy: 'LigneMed')]
    private Collection $recus;

    public function __construct()
    {
        $this->idMedicament = new ArrayCollection();
        $this->ordonnances = new ArrayCollection();
        $this->recus = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQuantite(): ?int
    {
        return $this->quantite;
    }

    public function setQuantite(int $quantite): static
    {
        $this->quantite = $quantite;

        return $this;
    }

    public function getNumLigne(): ?int
    {
        return $this->numLigne;
    }

    public function setNumLigne(int $numLigne): static
    {
        $this->numLigne = $numLigne;

        return $this;
    }

    /**
     * @return Collection<int, Medicament>
     */
    public function getIdMedicament(): Collection
    {
        return $this->idMedicament;
    }

    public function addIdMedicament(Medicament $idMedicament): static
    {
        if (!$this->idMedicament->contains($idMedicament)) {
            $this->idMedicament->add($idMedicament);
        }

        return $this;
    }

    public function removeIdMedicament(Medicament $idMedicament): static
    {
        $this->idMedicament->removeElement($idMedicament);

        return $this;
    }

    /**
     * @return Collection<int, Ordonnance>
     */
    public function getOrdonnances(): Collection
    {
        return $this->ordonnances;
    }

    public function addOrdonnance(Ordonnance $ordonnance): static
    {
        if (!$this->ordonnances->contains($ordonnance)) {
            $this->ordonnances->add($ordonnance);
            $ordonnance->setLigneMedicament($this);
        }

        return $this;
    }

    public function removeOrdonnance(Ordonnance $ordonnance): static
    {
        if ($this->ordonnances->removeElement($ordonnance)) {
            // set the owning side to null (unless already changed)
            if ($ordonnance->getLigneMedicament() === $this) {
                $ordonnance->setLigneMedicament(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Recu>
     */
    public function getRecus(): Collection
    {
        return $this->recus;
    }

    public function addRecu(Recu $recu): static
    {
        if (!$this->recus->contains($recu)) {
            $this->recus->add($recu);
            $recu->addLigneMed($this);
        }

        return $this;
    }

    public function removeRecu(Recu $recu): static
    {
        if ($this->recus->removeElement($recu)) {
            $recu->removeLigneMed($this);
        }

        return $this;
    }
}

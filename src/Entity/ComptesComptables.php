<?php

namespace App\Entity;

use App\Repository\ComptesComptablesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: ComptesComptablesRepository::class)]
class ComptesComptables
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups("getEcritures")]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Groups("getEcritures")]
    private ?string $intitule_compte = null;

    #[ORM\OneToMany(mappedBy: 'compte', targetEntity: Ecritures::class)]
    private Collection $ecritures;

    public function __construct()
    {
        $this->ecritures = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIntituleCompte(): ?string
    {
        return $this->intitule_compte;
    }

    public function setIntituleCompte(string $intitule_compte): static
    {
        $this->intitule_compte = $intitule_compte;

        return $this;
    }

    /**
     * @return Collection<int, Ecritures>
     */
    public function getEcritures(): Collection
    {
        return $this->ecritures;
    }

    public function addEcriture(Ecritures $ecriture): static
    {
        if (!$this->ecritures->contains($ecriture)) {
            $this->ecritures->add($ecriture);
            $ecriture->setCompte($this);
        }

        return $this;
    }

    public function removeEcriture(Ecritures $ecriture): static
    {
        if ($this->ecritures->removeElement($ecriture)) {
            // set the owning side to null (unless already changed)
            if ($ecriture->getCompte() === $this) {
                $ecriture->setCompte(null);
            }
        }

        return $this;
    }
}

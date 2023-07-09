<?php

namespace App\Entity;

use App\Repository\JournauxRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: JournauxRepository::class)]
class Journaux
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups("getEcritures")]
    private ?int $id = null;

    #[ORM\Column(length: 5)]
    #[Groups("getEcritures")]
    private ?string $code_journal = null;

    #[ORM\Column(length: 255)]
    #[Groups("getEcritures")]
    private ?string $intitule_journal = null;

    #[ORM\OneToMany(mappedBy: 'id_journal', targetEntity: Ecritures::class)]
    private Collection $ecritures;

    public function __construct()
    {
        $this->ecritures = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCodeJournal(): ?string
    {
        return $this->code_journal;
    }

    public function setCodeJournal(string $code_journal): static
    {
        $this->code_journal = $code_journal;

        return $this;
    }

    public function getIntituleJournal(): ?string
    {
        return $this->intitule_journal;
    }

    public function setIntituleJournal(string $intitule_journal): static
    {
        $this->intitule_journal = $intitule_journal;

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
            $ecriture->setJournal($this);
        }

        return $this;
    }

    public function removeEcriture(Ecritures $ecriture): static
    {
        if ($this->ecritures->removeElement($ecriture)) {
            // set the owning side to null (unless already changed)
            if ($ecriture->getJournal() === $this) {
                $ecriture->setJournal(null);
            }
        }

        return $this;
    }
}

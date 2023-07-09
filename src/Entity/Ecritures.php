<?php

namespace App\Entity;

use App\Repository\EcrituresRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: EcrituresRepository::class)]
class Ecritures
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    #[Groups("getEcritures")]
    private ?int $id_piece = null;

    #[ORM\Column(nullable: true)]
    #[Groups("getEcritures")]
    private ?float $debit = null;

    #[ORM\Column(nullable: true)]
    #[Groups("getEcritures")]
    private ?float $credit = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    #[Groups("getEcritures")]
    private ?\DateTimeInterface $date_ecriture = null;

    #[ORM\ManyToOne(inversedBy: 'ecritures')]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups("getEcritures")]
    private ?Journaux $journal = null;

    #[ORM\ManyToOne(inversedBy: 'ecritures')]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups("getEcritures")]
    private ?ComptesComptables $compte = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdPiece(): ?int
    {
        return $this->id_piece;
    }

    public function setIdPiece(int $id_piece): static
    {
        $this->id_piece = $id_piece;

        return $this;
    }

    public function getDebit(): ?float
    {
        return $this->debit;
    }

    public function setDebit(?float $debit): static
    {
        $this->debit = $debit;

        return $this;
    }

    public function getCredit(): ?float
    {
        return $this->credit;
    }

    public function setCredit(?float $credit): static
    {
        $this->credit = $credit;

        return $this;
    }

    public function getDateEcriture(): ?\DateTimeInterface
    {
        return $this->date_ecriture;
    }

    public function setDateEcriture(?\DateTimeInterface $date_ecriture): static
    {
        $this->date_ecriture = $date_ecriture;

        return $this;
    }

    public function getJournal(): ?Journaux
    {
        return $this->journal;
    }

    public function setJournal(?Journaux $journal): static
    {
        $this->journal = $journal;

        return $this;
    }

    public function getCompte(): ?ComptesComptables
    {
        return $this->compte;
    }

    public function setCompte(?ComptesComptables $compte): static
    {
        $this->compte = $compte;

        return $this;
    }
}

<?php

namespace App\Entity;

use App\Repository\BatimentRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BatimentRepository::class)]
class Batiment
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column]
    private ?int $nbEtage = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTime $dateConstruction = null;

    #[ORM\Column(length: 255)]
    private ?string $disponible = null;

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

    public function getNbEtage(): ?int
    {
        return $this->nbEtage;
    }

    public function setNbEtage(int $nbEtage): static
    {
        $this->nbEtage = $nbEtage;

        return $this;
    }

    public function getDateConstruction(): ?\DateTime
    {
        return $this->dateConstruction;
    }

    public function setDateConstruction(\DateTime $dateConstruction): static
    {
        $this->dateConstruction = $dateConstruction;

        return $this;
    }

    public function getDisponible(): ?string
    {
        return $this->disponible;
    }

    public function setDisponible(string $disponible): static
    {
        $this->disponible = $disponible;

        return $this;
    }
}

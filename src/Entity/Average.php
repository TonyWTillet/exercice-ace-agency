<?php

namespace App\Entity;

use App\Repository\AverageRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AverageRepository::class)]
class Average
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: false)]
    private string $lastname;

    #[ORM\Column(length: 255, nullable: false)]
    private string $firstname;

    #[ORM\Column(type: Types::JSON, nullable: false)]
    private array $details;

    #[ORM\Column(type: Types::FLOAT, nullable: false)]
    private float $average;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): static
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): static
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getDetails(): array
    {
        return $this->details;
    }

    public function setDetails(array $details): static
    {
        $this->details = $details;

        return $this;
    }

    public function getAverage(): ?float
    {
        return $this->average;
    }

    public function setAverage(float $average): static
    {
        $this->average = $average;

        return $this;
    }

    public function getFullName(): string
    {
        return $this->lastname . ' ' . $this->firstname;
    }
}

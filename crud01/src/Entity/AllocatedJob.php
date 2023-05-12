<?php

namespace App\Entity;

use App\Repository\AllocatedJobRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AllocatedJobRepository::class)]
class AllocatedJob
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $givenDate = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $completedDate = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $jobType = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGivenDate(): ?string
    {
        return $this->givenDate;
    }

    public function setGivenDate(?string $givenDate): self
    {
        $this->givenDate = $givenDate;

        return $this;
    }

    public function getCompletedDate(): ?\DateTimeInterface
    {
        return $this->completedDate;
    }

    public function setCompletedDate(?\DateTimeInterface $completedDate): self
    {
        $this->completedDate = $completedDate;

        return $this;
    }

    public function getJobType(): ?string
    {
        return $this->jobType;
    }

    public function setJobType(?string $jobType): self
    {
        $this->jobType = $jobType;

        return $this;
    }
}

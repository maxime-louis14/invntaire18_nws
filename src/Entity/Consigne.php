<?php

namespace App\Entity;

use App\Repository\ConsigneRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ConsigneRepository::class)]
class Consigne
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    #[ORM\Column(type: 'datetime')]
    private $bookingdate;

    #[ORM\Column(type: 'datetime')]
    private $duedate;

    #[ORM\Column(type: 'boolean', nullable: true)]
    private $rendu;

    #[ORM\Column(type: 'string', length: 255)]
    private $email;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getBookingdate(): ?\DateTimeInterface
    {
        return $this->bookingdate;
    }

    public function setBookingdate(\DateTimeInterface $bookingdate): self
    {
        $this->bookingdate = $bookingdate;

        return $this;
    }

    public function getDuedate(): ?\DateTimeInterface
    {
        return $this->duedate;
    }

    public function setDuedate(\DateTimeInterface $duedate): self
    {
        $this->duedate = $duedate;

        return $this;
    }

    public function isRendu(): ?bool
    {
        return $this->rendu;
    }

    public function setRendu(?bool $rendu): self
    {
        $this->rendu = $rendu;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }
}

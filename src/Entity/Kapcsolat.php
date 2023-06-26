<?php

namespace App\Entity;

use App\Repository\KapcsolatRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: KapcsolatRepository::class)]
class Kapcsolat
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #@Assert\NotBlank()
    private ?string $name = null;
  #@Assert\NotBlank()
  #@Assert\Email()
    #[ORM\Column(length: 255)]
    private ?string $email = null;
    #@Assert\NotBlank()
    #[ORM\Column(length: 255)]
    private ?string $message = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

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

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(string $message): static
    {
        $this->message = $message;

        return $this;
    }
}

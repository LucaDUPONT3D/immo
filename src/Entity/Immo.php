<?php

namespace App\Entity;

use App\Repository\ImmoRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ImmoRepository::class)]
#[ORM\HasLifecycleCallbacks]
class Immo
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $picture = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 7, scale: 2)]
    private ?string $area = null;

    #[ORM\Column]
    private ?int $habitableRooms = null;

    #[ORM\Column(length: 50)]
    private ?string $type = null;

    #[ORM\Column(length: 255)]
    private ?string $adress = null;

    #[ORM\Column]
    private ?bool $swimmingPool = null;

    #[ORM\Column]
    private ?bool $outside = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 7, scale: 2, nullable: true)]
    private ?string $outsideArea = null;

    #[ORM\Column]
    private ?bool $garage = null;

    #[ORM\Column(length: 50)]
    private ?string $sellType = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2)]
    private ?string $price = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $createdDate = null;

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
    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(string $picture): self
    {
        $this->picture = $picture;

        return $this;
    }


    public function getArea(): ?string
    {
        return $this->area;
    }

    public function setArea(string $area): self
    {
        $this->area = $area;

        return $this;
    }

    public function getHabitableRooms(): ?int
    {
        return $this->habitableRooms;
    }

    public function setHabitableRooms(int $habitableRooms): self
    {
        $this->habitableRooms = $habitableRooms;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getAdress(): ?string
    {
        return $this->adress;
    }

    public function setAdress(string $adress): self
    {
        $this->adress = $adress;

        return $this;
    }

    public function isSwimmingPool(): ?bool
    {
        return $this->swimmingPool;
    }

    public function setSwimmingPool(bool $swimmingPool): self
    {
        $this->swimmingPool = $swimmingPool;

        return $this;
    }

    public function isOutside(): ?bool
    {
        return $this->outside;
    }

    public function setOutside(bool $outside): self
    {
        $this->outside = $outside;

        return $this;
    }

    public function getOutsideArea(): ?string
    {
        return $this->outsideArea;
    }

    public function setOutsideArea(?string $outsideArea): self
    {
        $this->outsideArea = $outsideArea;

        return $this;
    }

    public function isGarage(): ?bool
    {
        return $this->garage;
    }

    public function setGarage(bool $garage): self
    {
        $this->garage = $garage;

        return $this;
    }

    public function getSellType(): ?string
    {
        return $this->sellType;
    }

    public function setSellType(string $sellType): self
    {
        $this->sellType = $sellType;

        return $this;
    }

    public function getPrice(): ?string
    {
        return $this->price;
    }

    public function setPrice(string $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getCreatedDate(): ?\DateTimeInterface
    {
        return $this->createdDate;
    }

    public function setCreatedDate(\DateTimeInterface $createdDate): self
    {
        $this->createdDate = $createdDate;

        return $this;
    }

    #[ORM\PrePersist]
    public function setCreatedValue(): void
    {
        $this->setCreatedDate(new \DateTime());
    }
}

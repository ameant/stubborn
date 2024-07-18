<?php

namespace App\Entity;

use App\Repository\SweatshirtsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SweatshirtsRepository::class)
 */
class Sweatshirts
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $size;

    /**
     * @ORM\Column(type="decimal", precision=4, scale=2)
     */
    private $price;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $stockXS;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $stockS;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $stockM;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $stockL;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $stockXL;

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

    public function getSize(): ?string
    {
        return $this->size;
    }

    public function setSize(string $size): self
    {
        $this->size = $size;

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

    public function getStockXS(): ?int
    {
        return $this->stockXS;
    }

    public function setStockXS(?int $stockXS): self
    {
        $this->stockXS = $stockXS;

        return $this;
    }

    public function getStockS(): ?int
    {
        return $this->stockS;
    }

    public function setStockS(?int $stockS): self
    {
        $this->stockS = $stockS;

        return $this;
    }

    public function getStockM(): ?int
    {
        return $this->stockM;
    }

    public function setStockM(?int $stockM): self
    {
        $this->stockM = $stockM;

        return $this;
    }

    public function getStockL(): ?int
    {
        return $this->stockL;
    }

    public function setStockL(?int $stockL): self
    {
        $this->stockL = $stockL;

        return $this;
    }

    public function getStockXL(): ?int
    {
        return $this->stockXL;
    }

    public function setStockXL(?int $stockXL): self
    {
        $this->stockXL = $stockXL;

        return $this;
    }
}

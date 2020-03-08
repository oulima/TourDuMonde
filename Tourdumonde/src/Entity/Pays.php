<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PaysRepository")
 */
class Pays
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $capital;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $image;
    
    private $continent;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Continent", inversedBy="pays")
     * @ORM\JoinColumn(nullable=false)
     */
    private $idcontinent;


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

    public function getCapital(): ?string
    {
        return $this->capital;
    }

    public function setCapital(string $capital): self
    {
        $this->capital = $capital;

        return $this;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getIdcontinent(): ?continent
    {
        return $this->idcontinent;
    }

    public function setIdcontinent(?continent $idcontinent): self
    {
        $this->idcontinent = $idcontinent;

        return $this;
    }
}

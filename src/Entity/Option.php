<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 *@ORM\Entity(repositoryClass="App\Repository\OptionRepository")
 *@Orm\Table(name="`option`")

 */
class Option
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Property", mappedBy="options")
     */
    private $poperties;

    public function __construct()
    {
        $this->poperties = new ArrayCollection();
    }

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

    /**
     * @return Collection|Property[]
     */
    public function getPoperties(): Collection
    {
        return $this->poperties;
    }

    public function addPoperty(Property $poperty): self
    {
        if (!$this->poperties->contains($poperty)) {
            $this->poperties[] = $poperty;
        }

        return $this;
    }

    public function removePoperty(Property $poperty): self
    {
        if ($this->poperties->contains($poperty)) {
            $this->poperties->removeElement($poperty);
        }

        return $this;
    }
}

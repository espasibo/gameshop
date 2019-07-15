<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PlatformRepository")
 */
class Platform
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
     * @ORM\OneToMany(targetEntity="App\Entity\ExtraFeatures", mappedBy="platform")
     */
    private $extra_features;

    public function __construct()
    {
        $this->extra_features = new ArrayCollection();
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
     * @return Collection|ExtraFeatures[]
     */
    public function getExtraFeatures(): Collection
    {
        return $this->extra_features;
    }

    public function addExtraFeature(ExtraFeatures $extraFeature): self
    {
        if (!$this->extra_features->contains($extraFeature)) {
            $this->extra_features[] = $extraFeature;
            $extraFeature->setPlatform($this);
        }

        return $this;
    }

    public function removeExtraFeature(ExtraFeatures $extraFeature): self
    {
        if ($this->extra_features->contains($extraFeature)) {
            $this->extra_features->removeElement($extraFeature);
            // set the owning side to null (unless already changed)
            if ($extraFeature->getPlatform() === $this) {
                $extraFeature->setPlatform(null);
            }
        }

        return $this;
    }
}

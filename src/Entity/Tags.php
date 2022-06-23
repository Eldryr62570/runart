<?php

namespace App\Entity;

use Exception;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\TagsRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

#[ORM\Entity(repositoryClass: TagsRepository::class)]
class Tags
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $nom_tag;

    #[ORM\ManyToMany(targetEntity: Oeuvre::class, mappedBy: 'tags')]
    private $oeuvre;

    public function __construct($name)
    {
        $this->nom_tag = $name;
        $this->oeuvre = new ArrayCollection();
    }
    
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomTag(): ?string
    {
        return $this->nom_tag;
    }

    public function setNomTag(string $nom_tag): self
    {
        $this->nom_tag = $nom_tag;

        return $this;
    }

    /**
     * @return Collection<int, Oeuvre>
     */
    public function getOeuvre(): Collection
    {
        return $this->oeuvre;
    }

    public function addOeuvre(Oeuvre $oeuvre): self
    {
        if (!$this->oeuvre->contains($oeuvre)) {
            $this->oeuvre[] = $oeuvre;
        }

        return $this;
    }

    public function removeOeuvre(Oeuvre $oeuvre): self
    {
        $this->oeuvre->removeElement($oeuvre);

        return $this;
    }
    public function __toString()
    {
        return $this->nom_tag;
    }
}

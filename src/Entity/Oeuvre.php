<?php

namespace App\Entity;

use App\Repository\OeuvreRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OeuvreRepository::class)]
class Oeuvre
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $photo_oeuvre;

    #[ORM\Column(type: 'string', length: 255)]
    private $nom_oeuvre;

    #[ORM\Column(type: 'integer')]
    private $prix;

    #[ORM\Column(type: 'text', nullable:'true')]
    private $description_oeuvre;

    #[ORM\ManyToMany(targetEntity: User::class, inversedBy: 'oeuvres')]
    private $users;

    #[ORM\ManyToOne(targetEntity: Categorie::class, inversedBy: 'oeuvre')]
    #[ORM\JoinColumn(nullable: true)]
    private $categorie;

    #[ORM\ManyToMany(targetEntity: Tags::class, mappedBy: 'oeuvre')]
    private $tags;

    public function __construct()
    {
        $this->users = new ArrayCollection();
        $this->tags = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPhotoOeuvre(): ?string
    {
        return $this->photo_oeuvre;
    }

    public function setPhotoOeuvre(string $photo_oeuvre): self
    {
        $this->photo_oeuvre = $photo_oeuvre;

        return $this;
    }

    public function getNomOeuvre(): ?string
    {
        return $this->nom_oeuvre;
    }

    public function setNomOeuvre(string $nom_oeuvre): self
    {
        $this->nom_oeuvre = $nom_oeuvre;

        return $this;
    }

    public function getPrix(): ?int
    {
        return $this->prix;
    }

    public function setPrix(int $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getDescriptionOeuvre(): ?string
    {
        return $this->description_oeuvre;
    }

    public function setDescriptionOeuvre(string $description_oeuvre): self
    {
        $this->description_oeuvre = $description_oeuvre;

        return $this;
    }

    /**
     * @return Collection<int, User>
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(User $user): self
    {
        if (!$this->users->contains($user)) {
            $this->users[] = $user;
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        $this->users->removeElement($user);

        return $this;
    }

    public function getCategorie(): ?Categorie
    {
        return $this->categorie;
    }

    public function setCategorie(?Categorie $categorie): self
    {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * @return Collection<int, Tags>
     */
    public function getTags(): Collection
    {
        return $this->tags;
    }

    public function addTag(Tags $tag): self
    {
        if (!$this->tags->contains($tag)) {
            $this->tags[] = $tag;
            $tag->addOeuvre($this);
        }

        return $this;
    }

    public function removeTag(Tags $tag): self
    {
        if ($this->tags->removeElement($tag)) {
            $tag->removeOeuvre($this);
        }

        return $this;
    }
}

<?php

namespace App\Entity;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Produit
 *
 * @ORM\Table(name="produit")
 * @ORM\Entity(repositoryClass="App\Repository\ProduitRepository")
 * @UniqueEntity("reference",message="Cette référence est déja attribuée à un produit")
 */
class Produit
{
    /**
     * @var int
     *
     * @ORM\Column(name="reference", type="integer", nullable=false)
     * @ORM\Id
     * @Assert\NotBlank(message="Vous devez remplir ce champ")
     * @Assert\NotNull(message="Champ obligatoire")
     */
    private $reference;

    /**
     * @var string
     *
     * @ORM\Column(name="libelle", type="string", length=30, nullable=false)
     * @Assert\NotBlank(message="Vous devez remplir ce champ")
     * @Assert\NotNull(message="Champ obligatoire")
     */
    private $libelle;

    /**
     * @var string
     *
     * @ORM\Column(name="categorie", type="string", length=30, nullable=false)
     * @Assert\NotBlank(message="Vous devez remplir ce champ")
     * @Assert\NotNull(message="Champ obligatoire")
     */
    private $categorie;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=100, nullable=false)
     * @Assert\NotBlank(message="Vous devez remplir ce champ")
     * @Assert\NotNull(message="Champ obligatoire")
     */
    private $description;

    /**
     * @var float
     *
     * @ORM\Column(name="prix", type="float", precision=10, scale=0, nullable=false)
     * @Assert\NotBlank(message="Vous devez remplir ce champ")
     * @Assert\NotNull(message="Champ obligatoire")
     * @Assert\Type(type="float", message="Veuillez saisir un entier")
     * @Assert\PositiveOrZero(message="Le prix doit etre positif")
     */
    private $prix;



    /**
     * @var int
     *
     * @ORM\Column(name="note", type="integer", nullable=false)
     */
    private $note;

    /**
     * @var string
     *
     * @ORM\Column(name="img", type="string" , length=255 , nullable=true)
     */
    private $img;

    public function getReference(): ?int
    {
        return $this->reference;
    }
    public function setReference(int $reference): self
    {
        $this->reference=$reference;
        return $this;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    public function getCategorie(): ?string
    {
        return $this->categorie;
    }

    public function setCategorie(string $categorie): self
    {
        $this->categorie = $categorie;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getNote(): ?int
    {
        return $this->note;
    }

    public function setNote(int $note): self
    {
        $this->note = $note;

        return $this;
    }

    public function getImg(): ?string
    {
        return $this->img;
    }

    public function setImg(?string $img): self
    {
        $this->img = $img;

        return $this;
    }

    public function __toString()
    {
        return (string) $this->reference;
    }



}

<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * Evenement
 *
 * @ORM\Table(name="evenement")
 * @ORM\Entity(repositoryClass="App\Repository\EvenementRepository")
 * @UniqueEntity(fields="reference", message="Un evenement existe déjà avec cette reference.")
 */
class Evenement
{
    /**
     * @var int
     *
     * @ORM\Column(name="reference", type="integer", nullable=false)
     * @ORM\Id
     * @Groups("event:read")
     */
    private $reference;

    /**

     * @ORM\Column(name="dateDebut", type="date", nullable=false)
     * @Assert\GreaterThanOrEqual("today",message="La date du debut doit être supérieure à la date d'aujourd'hui"))
     * @Groups("event:read")
     */
    private $datedebut;

    /**
     
     *
     * @ORM\Column(name="dateFin", type="date", nullable=false)
     * @Assert\GreaterThanOrEqual(propertyPath="dateDebut",
    * message="La date du fin doit être supérieure à la date début")
     * @Groups("event:read")
     */
    private $datefin;

    /**
     * @var string
     *
     * @ORM\Column(name="localisation", type="string", length=50, nullable=false)
         * @Assert\Length(
     *      min = 3,
     *      max = 100,
     *      minMessage = "Your first name must be at least {{ limit }} characters long",
     *      maxMessage = "Your first name cannot be longer than {{ limit }} characters"
     * )
     * @Groups("event:read")
     */
    private $localisation;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=50, nullable=false)
     *  * @Assert\Length(
     *      min = 10,
     *      max = 250,
     *      minMessage = "Your first name must be at least {{ limit }} characters long",
     *      maxMessage = "Your first name cannot be longer than {{ limit }} characters")
     * @Groups("event:read")
     */
    private $description;
     /**
     * @var string
     *
     * @ORM\Column(name="photo", type="string", length=50, nullable=true)
       * @Assert\NotBlank(message="Please, upload the photo.")
     *  @Assert\File(mimeTypes={ "image/png", "image/jpeg" , "image/jpg" })
      * @Groups("event:read")
     */
    private $photo;

    /**
     * @var int
     *
     * @ORM\Column(name="nbrParticipant", type="integer", nullable=false)
     * @Assert\Positive(message="le nbr Participants doit etre positive")
     * @Groups("event:read")
     */
    private $nbrparticipant;

    /**
     * @var string
     *
     * @ORM\Column(name="Titre", type="string", length=50, nullable=false)
     * @Groups("event:read")
     */
    private $titre;

    public function getReference(): ?int
    {
        return $this->reference;
    }

    public function getDatedebut(): ?\DateTimeInterface
    {
        return $this->datedebut;
    }

    public function setDatedebut(\DateTimeInterface $datedebut): self
    {
        $this->datedebut = $datedebut;

        return $this;
    }

    public function getDatefin(): ?\DateTimeInterface
    {
        return $this->datefin;
    }

    public function setDatefin(\DateTimeInterface $datefin): self
    {
        $this->datefin = $datefin;

        return $this;
    }

    public function getLocalisation(): ?string
    {
        return $this->localisation;
    }

    public function setLocalisation(string $localisation): self
    {
        $this->localisation = $localisation;

        return $this;
    }

    public function setReference(int $reference): self
    {
        $this->reference = $reference;

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
    public function getPhoto()
    {
        return $this->photo;
    }

    public function setPhoto($photo)
    {
        $this->photo = $photo;

        return $this;
    }

    public function getNbrparticipant(): ?int
    {
        return $this->nbrparticipant;
    }

    public function setNbrparticipant(int $nbrparticipant): self
    {
        $this->nbrparticipant = $nbrparticipant;

        return $this;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

 /**
     * @return Collection|Participation[]
     */
    public function getParticipation(): Collection
    {
        return $this->participation;
    }

    /**
     * @ORM\OneToMany(targetEntity=Participation::class, mappedBy="idEvent",cascade={"remove"}, orphanRemoval=true )
     */
    private $participation;

    public function __construct2()
    {
        $this->participation = new ArrayCollection();
    }
    public function __toString()
    {
        return (string)$this->getReference();
    }
}

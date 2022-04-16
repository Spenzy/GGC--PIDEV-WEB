<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Commentaire
 *
 * @ORM\Table(name="commentaire", indexes={@ORM\Index(name="fk_commentaire", columns={"idPublication"}), @ORM\Index(name="fk_commentaire_client", columns={"idClient"})})
 * @ORM\Entity(repositoryClass="App\Repository\CommentaireRepository")
 */
class Commentaire
{
    /**
     * @var int
     *
     * @ORM\Column(name="idCommentaire", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue
     */
    private $idcommentaire;

    /**
     * @var int
     *
     * @ORM\ManyToOne(targetEntity="Publication")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idPublication", referencedColumnName="idPublication")
     * })
     */
    private $idpublication;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=250, nullable=false)
     * @Assert\NotBlank(message="Veuillez taper un commentaire!")
     * @Assert\Type("string", message="Le contenu {{ description }} n'est pas une chaine valide.")
     */
    private $description;

    /**
     * @var \Client
     *
     * @ORM\ManyToOne(targetEntity="Client")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idClient", referencedColumnName="idClient")
     * })
     */
    private $idclient;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date", nullable=false)
     * @Assert\NotBlank
     * @Assert\Type("Date")
     */
    private $date;

    public function getIdcommentaire(): ?int
    {
        return $this->idcommentaire;
    }

    public function getIdpublication(): ?Publication
    {
        return $this->idpublication;
    }

    public function setIdpublication(Publication $pub): self
    {
        $this->idpublication = $pub;
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

    public function getIdclient(): ?Client
    {
        return $this->idclient;
    }

    public function setIdclient(?Client $idclient): self
    {
        $this->idclient = $idclient;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }


}

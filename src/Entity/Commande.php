<?php

namespace App\Entity;
use Symfony\Component\Validator\Constraints as Assert;

use Doctrine\ORM\Mapping as ORM;

/**
 * Commande
 *
 * @ORM\Table(name="commande", indexes={@ORM\Index(name="fk_client_commande", columns={"idClient"})})
 * @ORM\Entity(repositoryClass="App\Repository\CommandeRepository")
 */
class Commande
{
    /**
     * @var int
     *
     * @ORM\Column(name="idCommande", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idcommande;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=100, nullable=false)
     * @Assert\NotNull(message="Champ obligatoire")
     * @Assert\NotBlank(message="Veuillez saisir l'adresse de livraison")
     */
    private $adresse;

    /**
     * @var float
     *
     * @ORM\Column(name="prix", type="float", precision=10, scale=0, nullable=false)
     * @Assert\NotNull(message="Champ obligatoire")
     */
    private $prix;

    /**
     * @var bool
     *
     * @ORM\Column(name="livree", type="boolean", nullable=false)
     * @Assert\NotNull(message="Champ obligatoire")
     */
    private $livree;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DateCommande", type="date", nullable=false)
     * @Assert\NotNull(message="Champ obligatoire")
     */
    private $datecommande;

    /**
     * @var \Client
     *
     *
     * @ORM\OneToOne(targetEntity="Client")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idClient", referencedColumnName="idClient")
     * })
     * @Assert\NotNull(message="Champ obligatoire")
     */
    private $idclient;

    public function getIdcommande(): ?int
    {
        return $this->idcommande;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

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

    public function getLivree(): ?bool
    {
        return $this->livree;
    }

    public function setLivree(bool $livree): self
    {
        $this->livree = $livree;

        return $this;
    }

    public function getDatecommande(): ?\DateTimeInterface
    {
        return $this->datecommande;
    }

    public function setDatecommande(\DateTimeInterface $datecommande): self
    {
        $this->datecommande = $datecommande;

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

    public function __toString()
    {
        return (string) $this->getIdcommande();
    }

}

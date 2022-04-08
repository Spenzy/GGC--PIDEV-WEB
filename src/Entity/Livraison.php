<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Livraison
 *
 * @ORM\Table(name="livraison", indexes={@ORM\Index(name="fk_livraison_livreur", columns={"idLivreur"}), @ORM\Index(name="fk_livraison_commande", columns={"idCommande"})})
 * @ORM\Entity(repositoryClass="App\Repository\LivraisonRepository")
 */
class Livraison
{
    /**
     * @var \Commande
     *
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="Commande")
     *  @ORM\JoinColumns({
     * @ORM\JoinColumn(name="idCommande", referencedColumnName="idCommande")
     * })
     * @Assert\NotBlank(message="Champ obligatoire")
     * @Assert\NotNull(message="Champ obligatoire")
     */
    private $idcommande;

    /**
     * @var \Livreur
     *
     * @ORM\ManyToOne(targetEntity="Livreur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idLivreur", referencedColumnName="idLivreur")
     * })
     * @Assert\NotBlank(message="Champ obligatoire")
     * @Assert\NotNull(message="Champ obligatoire")
     */
    private $idlivreur;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DateHeure", type="date", nullable=false)
     * @Assert\NotBlank(message="Champ obligatoire")
     * @Assert\NotNull(message="Champ obligatoire")
     * @Assert\GreaterThan(value="today" ,message="Veuillez saisir une date supérieure à celle d'aujourd'hui")
     *
     */
    private $dateheure;

    public function getIdcommande(): ?Commande
    {
        return $this->idcommande;
    }
    public function setIdcommande(Commande $idcommande): self
    {
        $this->idcommande = $idcommande;

        return $this;
    }
    public function getIdlivreur(): ?Livreur
    {
        return $this->idlivreur;
    }

    public function setIdlivreur(Livreur $idlivreur): self
    {
        $this->idlivreur = $idlivreur;

        return $this;
    }

    public function getDateheure(): ?\DateTimeInterface
    {
        return $this->dateheure;
    }

    public function setDateheure(\DateTimeInterface $dateheure): self
    {
        $this->dateheure = $dateheure;

        return $this;
    }


}

<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

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
     * @ORM\JoinColumn(name="idCommande", referencedColumnName="idCommande")
     */
    private $idcommande;

    /**
     * @var \Livreur
     *
     * @ORM\ManyToOne(targetEntity="Livreur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idLivreur", referencedColumnName="idLivreur")
     * })
     */
    private $idlivreur;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DateHeure", type="date", nullable=false)
     */
    private $dateheure;

    public function getIdcommande(): ?Commande
    {
        return $this->idcommande;
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

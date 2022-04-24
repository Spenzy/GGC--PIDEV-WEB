<?php

namespace App\Entity;
use Symfony\Component\Validator\Constraints as Assert;

use Doctrine\ORM\Mapping as ORM;

/**
 * Avis
 *
 * @ORM\Table(name="avis", indexes={@ORM\Index(name="fk_avis_client", columns={"idClient"}), @ORM\Index(name="fk_avis_produit", columns={"referenceProduit"})})
 * @ORM\Entity(repositoryClass="App\Repository\AvisRepository")
 *
 */
class Avis
{
    /**
     * @var int
     *
     * @ORM\Column(name="idAvis", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idavis;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=100, nullable=false)
     * @Assert\NotBlank(message="Champ obligatoire")
     * @Assert\Type("string",message="Veuillez saisir une chaine")
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=50, nullable=false)
     * @Assert\NotBlank(message="Champ obligatoire")
     */
    private $type;

    /**
     * @var \Client
     *
     * @ORM\ManyToOne(targetEntity="Client")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idClient", referencedColumnName="idClient")
     * })
     * @Assert\NotBlank(message="Champ obligatoire")

     */
    private $idclient;

    /**
     * @var \Produit
     *
     * @ORM\ManyToOne(targetEntity="Produit")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="referenceProduit", referencedColumnName="reference")
     * })
     * @Assert\NotBlank(message="Champ obligatoire")
     */
    private $referenceproduit;

    public function getIdavis(): ?int
    {
        return $this->idavis;
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

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

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

    public function getReferenceproduit(): ?Produit
    {
        return $this->referenceproduit;
    }

    public function setReferenceproduit(?Produit $referenceproduit): self
    {
        $this->referenceproduit = $referenceproduit;

        return $this;
    }


}

<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * Vote
 *
 * @ORM\Table(name="vote", indexes={@ORM\Index(name="fk_vote_publication", columns={"idPublication"}), @ORM\Index(name="fk_vote_client", columns={"idClient"})})
 * @ORM\Entity(repositoryClass="App\Repository\VoteRepository")
 */
class Vote
{
    /**
     * @var \Client
     *
     * @ORM\Id()
     * @ORM\ManyToOne(targetEntity="Client")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idClient", referencedColumnName="idClient")
     * })
     */
    private $idclient;

    /**
     * @var \Publication
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
     * @ORM\Column(name="type", type="string", length=10, nullable=false)
     */
    private $type;

    public function getIdclient(): ?Client
    {
        return $this->idclient;
    }

    public function setIdclient(?Client $idclient): self
    {
        $this->idclient = $idclient;

        return $this;
    }

    public function getIdpublication(): ?Publication
    {
        return $this->idpublication;
    }

    public function setIdpublication(?Publication $pub): self
    {
        $this->idpublication = $pub;
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


}

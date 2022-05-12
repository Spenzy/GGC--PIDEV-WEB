<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

/**
 * Streamer
 *
 * @ORM\Table(name="streamer")
 * @ORM\Entity(repositoryClass="App\Repository\StreamerRepository")
 */
class Streamer
{
    /**
     * @var string
     * @Assert\Length(
     *      min = 2,
     *      max = 90,
     *      minMessage = "The information must be at least {{ limit }} characters long",
     *      maxMessage = "The information cannot be longer than {{ limit }} characters"
     * )
     * @ORM\Column(name="informations", type="string", length=100, nullable=false)
     */
    private $informations;

    /**
     * @var string
     * @Assert\Length(
     *      min = 12,
     *      max = 90,
     *      minMessage = "The link must be at least {{ limit }} characters long",
     *      maxMessage = "The link cannot be longer than {{ limit }} characters"
     * )
     *
     *
     * @ORM\Column(name="lienStreaming", type="string", length=50, nullable=false)
     */
    private $lienstreaming;

    /**
     * @var \Personne
     *
     * @ORM\Id
     * @ORM\OneToOne(targetEntity="Personne")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idStreamer", referencedColumnName="id_personne")
     * })
     */
    private $idstreamer;

    public function getInformations(): ?string
    {
        return $this->informations;
    }

    public function setInformations(string $informations): self
    {
        $this->informations = $informations;

        return $this;
    }

    public function getLienstreaming(): ?string
    {
        return $this->lienstreaming;
    }

    public function setLienstreaming(string $lienstreaming): self
    {
        $this->lienstreaming = $lienstreaming;

        return $this;
    }

    public function getIdstreamer(): ?Personne
    {
        return $this->idstreamer;
    }

    public function setIdstreamer(?Personne $idstreamer): self
    {
        $this->idstreamer = $idstreamer;

        return $this;
    }

    public function __toString(): string
    {
        return $this->getIdstreamer()->getNom();
    }

}

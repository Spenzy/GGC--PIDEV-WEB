<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * Plan
 *
 * @ORM\Table(name="plan", indexes={@ORM\Index(name="fk_plan_streamer", columns={"idStreamer"})})
 * @ORM\Entity(repositoryClass="App\Repository\PlanRepository")
 */
class Plan
{
    /**
     * @var int
     *
     * @ORM\Column(name="idPlan", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue
     */
    private $idplan;

    /**
     * @var \DateTime
     * @Assert\GreaterThanOrEqual("today")
     * @ORM\Column(name="date", type="date", nullable=false)
     */
    private $date;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="heure", type="time", nullable=false)
     */
    private $heure;

    /**
     * @var float
     * @Assert\Positive
     * @ORM\Column(name="duree", type="float", precision=10, scale=0, nullable=false)
     */
    private $duree;

    /**
     * @var string
     *
     * @Assert\Length(
     *      min = 7,
     *      max = 90,
     *      minMessage = "The information must be at least {{ limit }} characters long",
     *      maxMessage = "The information cannot be longer than {{ limit }} characters"
     * )
     * 
     * 
     * @ORM\Column(name="description", type="string", length=100, nullable=false)
     */
    private $description;

    /**
     * @var int
     *
     * @ORM\Column(name="idEvenement", type="integer", nullable=false)
     */
    private $idevenement;

    /**
     * @var \Streamer
     * 
     * @ORM\ManyToOne(targetEntity="Streamer")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idStreamer", referencedColumnName="idStreamer")
     * })
     */
    private $idstreamer;

    public function getIdplan(): ?int
    {
        return $this->idplan;
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

    public function getHeure(): ?\DateTimeInterface
    {
        return $this->heure;
    }

    public function setHeure(\DateTimeInterface $heure): self
    {
        $this->heure = $heure;

        return $this;
    }

    public function getDuree(): ?float
    {
        return $this->duree;
    }

    public function setDuree(float $duree): self
    {
        $this->duree = $duree;

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

    public function getIdevenement(): ?int
    {
        return $this->idevenement;
    }

    public function setIdevenement(int $idevenement): self
    {
        $this->idevenement = $idevenement;

        return $this;
    }

    public function getIdstreamer(): ?Streamer
    {
        return $this->idstreamer;
    }

    public function setIdstreamer(?Streamer $streamer): self
    {
        $this->idstreamer = $streamer;

        return $this;
    }


}

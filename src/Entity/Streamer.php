<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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
     *
     * @ORM\Column(name="informations", type="string", length=100, nullable=false)
     */
    private $informations;

    /**
     * @var string
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
    private $idStreamer;

    /**
     * @ORM\OneToMany(targetEntity=Plan::class, mappedBy="streamer")
     */
    private $plans;

    public function __construct()
    {
        $this->plans = new ArrayCollection();
    }

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

    /**
     * @return Collection<int, Plan>
     */
    public function getPlans(): Collection
    {
        return $this->plans;
    }

    public function addPlan(Plan $plan): self
    {
        if (!$this->plans->contains($plan)) {
            $this->plans[] = $plan;
            $plan->setStreamer($this);
        }

        return $this;
    }

    public function removePlan(Plan $plan): self
    {
        if ($this->plans->removeElement($plan)) {
            // set the owning side to null (unless already changed)
            if ($plan->getStreamer() === $this) {
                $plan->setStreamer(null);
            }
        }

        return $this;
    }

}

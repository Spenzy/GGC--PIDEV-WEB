<?php

namespace App\Entity;

use App\Repository\ParticipationRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=ParticipationRepository::class)
 */
class Participation
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $idParticipation;

    public function getIdParticipation(): ?int
    {
        return $this->idParticipation;
    }
     /**
     * @ORM\ManyToOne(targetEntity=Client::class)
     * @ORM\JoinColumn(name="idClient",referencedColumnName="idClient",nullable=false)
     */
    private $idClient;

    /**
     * @ORM\ManyToOne(targetEntity=Evenement::class)
     * @ORM\JoinColumn(name="idEvent",referencedColumnName="reference",nullable=false)
     */
    private $idEvent;


   



    public function getIdClient(): ?Client
    {
        return $this->idClient;
    }

    public function setIdClient(?Client $idClient): self
    {
        $this->idClient = $idClient;

        return $this;
    }

    public function getIdEvent(): ?Evenement
    {
        return $this->idEvent;
    }


    public function setIdEvent(?Evenement $idEvent): self
    {
        $this->idEvent = $idEvent;

        return $this;
    }




}

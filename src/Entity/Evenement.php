<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Evenement
 *
 * @ORM\Table(name="evenement")
 * @ORM\Entity
 */
class Evenement
{
    /**
     * @var int
     *
     * @ORM\Column(name="reference", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $reference;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateDebut", type="date", nullable=false)
     */
    private $datedebut;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateFin", type="date", nullable=false)
     */
    private $datefin;

    /**
     * @var string
     *
     * @ORM\Column(name="localisation", type="string", length=50, nullable=false)
     */
    private $localisation;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=50, nullable=false)
     */
    private $description;

    /**
     * @var int
     *
     * @ORM\Column(name="nbrParticipant", type="integer", nullable=false)
     */
    private $nbrparticipant;

    /**
     * @var string
     *
     * @ORM\Column(name="Titre", type="string", length=50, nullable=false)
     */
    private $titre;


}

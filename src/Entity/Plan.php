<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Plan
 *
 * @ORM\Table(name="plan", indexes={@ORM\Index(name="fk_plan_streamer", columns={"idStreamer"}), @ORM\Index(name="fk_plan_evenement", columns={"idEvenement"})})
 * @ORM\Entity
 */
class Plan
{
    /**
     * @var int
     *
     * @ORM\Column(name="idPlan", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $idplan;

    /**
     * @var int
     *
     * @ORM\Column(name="idStreamer", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $idstreamer;

    /**
     * @var \DateTime
     *
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
     *
     * @ORM\Column(name="duree", type="float", precision=10, scale=0, nullable=false)
     */
    private $duree;

    /**
     * @var string
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


}

<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Streamer
 *
 * @ORM\Table(name="streamer")
 * @ORM\Entity
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
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Personne")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idStreamer", referencedColumnName="id_personne")
     * })
     */
    private $idstreamer;


}

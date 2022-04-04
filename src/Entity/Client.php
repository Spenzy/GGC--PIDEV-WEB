<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Client
 *
 * @ORM\Table(name="client")
 * @ORM\Entity
 */
class Client
{
    /**
     * @var int
     *
     * @ORM\Column(name="nbrAvertissement", type="integer", nullable=false)
     */
    private $nbravertissement;

    /**
     * @var int
     *
     * @ORM\Column(name="ban", type="integer", nullable=false)
     */
    private $ban;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="dateDebutBlock", type="date", nullable=true)
     */
    private $datedebutblock;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="dateFinBlock", type="date", nullable=true)
     */
    private $datefinblock;

    /**
     * @var \Personne
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Personne")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idClient", referencedColumnName="id_personne")
     * })
     */
    private $idclient;


}

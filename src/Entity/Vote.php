<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Vote
 *
 * @ORM\Table(name="vote", indexes={@ORM\Index(name="fk_vote_publication", columns={"idPublication"})})
 * @ORM\Entity
 */
class Vote
{
    /**
     * @var int
     *
     * @ORM\Column(name="idClient", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $idclient;

    /**
     * @var int
     *
     * @ORM\Column(name="idPublication", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $idpublication;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=10, nullable=false)
     */
    private $type;


}

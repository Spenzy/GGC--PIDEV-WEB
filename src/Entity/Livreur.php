<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Livreur
 *
 * @ORM\Table(name="livreur")
 * @ORM\Entity
 */
class Livreur
{
    /**
     * @var bool|null
     *
     * @ORM\Column(name="disponibilite", type="boolean", nullable=true)
     */
    private $disponibilite;

    /**
     * @var \Personne
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Personne")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idLivreur", referencedColumnName="id_personne")
     * })
     */
    private $idlivreur;


}

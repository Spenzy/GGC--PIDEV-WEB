<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Lignecommande
 *
 * @ORM\Table(name="lignecommande", indexes={@ORM\Index(name="fk_ligne_produit", columns={"idProduit"}), @ORM\Index(name="fk_ligne_commande", columns={"idCommande"})})
 * @ORM\Entity
 */
class Lignecommande
{
    /**
     * @var int
     *
     * @ORM\Column(name="idLigne", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $idligne;

    /**
     * @var int
     *
     * @ORM\Column(name="idCommande", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $idcommande;

    /**
     * @var int
     *
     * @ORM\Column(name="idProduit", type="integer", nullable=false)
     */
    private $idproduit;

    /**
     * @var int
     *
     * @ORM\Column(name="quantite", type="integer", nullable=false)
     */
    private $quantite;

    /**
     * @var float
     *
     * @ORM\Column(name="prix", type="float", precision=10, scale=0, nullable=false)
     */
    private $prix;


}

<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Publication
 *
 * @ORM\Table(name="publication", indexes={@ORM\Index(name="fk_publication_client", columns={"idClient"})})
 * @ORM\Entity
 */
class Publication
{
    /**
     * @var int
     *
     * @ORM\Column(name="idPublication", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idpublication;

    /**
     * @var string
     *
     * @ORM\Column(name="object", type="string", length=100, nullable=false)
     */
    private $object;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=250, nullable=false)
     */
    private $description;

    /**
     * @var bool
     *
     * @ORM\Column(name="archive", type="boolean", nullable=false)
     */
    private $archive;

    /**
     * @var int
     *
     * @ORM\Column(name="idClient", type="integer", nullable=false)
     */
    private $idclient;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date", nullable=false)
     */
    private $date;


}

<?php

namespace App\Entity;

use DateTime;
use DateTimeInterface;
use Symfony\Component\Serializer\Annotation\Groups;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Publication
 *
 * @ORM\Table(name="publication", indexes={@ORM\Index(name="fk_publication_client", columns={"idClient"})})
 * @ORM\Entity(repositoryClass="App\Repository\PublicationRepository")
 */
class Publication
{
    /**
     * @var int
     *
     * @ORM\Column(name="idPublication", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @Groups("post:read")
     */
    private $idpublication;

    /**
     * @var string
     *
     * @ORM\Column(name="object", type="string", length=100, nullable=false)
     * @Assert\NotBlank(message="Veuillez entrer un objet!")
     * @Assert\Type("string", message="Le contenu {{ description }} n'est pas une chaine valide.")
     * @Groups("post:read")
     */
    private $object;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=250, nullable=false)
     * @Assert\Type("string", message="Le contenu {{ description }} n'est pas une chaine valide.")
     * @Groups("post:read")
     */
    private $description;

    /**
     * @var bool
     *
     * @ORM\Column(name="archive", type="boolean", nullable=false)
     * @Groups("post:read")
     */
    private $archive;

    /**
     * @var \Client
     *
     * @ORM\ManyToOne(targetEntity="Client")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idClient", referencedColumnName="idClient")
     * })
     */
    private $idclient;

    /**
     * @var DateTime
     *
     * @ORM\Column(name="date", type="date", nullable=false)
     * @Groups("post:read")
     */
    private $date;

    public function getIdpublication(): ?int
    {
        return $this->idpublication;
    }

    public function getObject(): ?string
    {
        return $this->object;
    }

    public function setObject(string $object): self
    {
        $this->object = $object;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getArchive(): ?bool
    {
        return $this->archive;
    }

    public function setArchive(bool $archive): self
    {
        $this->archive = $archive;

        return $this;
    }

    public function getIdclient(): ?Client
    {
        return $this->idclient;
    }

    public function setIdclient(?Client $idclient): self
    {
        $this->idclient = $idclient;

        return $this;
    }

    public function getDate(): ?DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function __toString(): string
    {
        return "Publication";
    }
}

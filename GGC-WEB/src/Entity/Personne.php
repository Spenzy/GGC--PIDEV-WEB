<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

use Symfony\Component\Validator\Constraints as Assert;
use App\Validator\Constraints\ComplexPassword;
use Symfony\Component\Serializer\Annotation\Groups;


/**
 * Personne
 *
 * @ORM\Table(name="personne")
 * @ORM\Entity(repositoryClass="App\Repository\PersonneRepository")
 * @UniqueEntity("email",message="Cette email est déja attribuée ")
 */
class Personne
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_personne", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @Groups({"cl"})

     */
    private $idPersonne;

    /**
     * @var string
     * @Assert\Length(
     *      min = 4,
     *      max = 50,
     *      minMessage = "least {{ limit }} characters long",
     *      maxMessage = "cannot be longer than {{ limit }} characters"
     * )
     * @ORM\Column(name="nom", type="string", length=30, nullable=false)
     * @Assert\NotBlank(message="please enter your nom")
     * @Groups({"cl"})

     */
    private $nom;

    /**
     * @var string
     * @ORM\Column(name="prenom", type="string", length=30, nullable=false)
     * * @Assert\Length(
     *      min = 4,
     *      max = 50,
     *      minMessage = "least {{ limit }} characters long",
     *      maxMessage = "cannot be longer than {{ limit }} characters"
     * )
     * @Assert\NotBlank(message="please enter your prenom")
     * @Groups({"cl"})


     */
    private $prenom;

    /**
     * @var \DateTime
     * @ORM\Column(name="dateNaissance", type="date", nullable=false)
     * @Groups({"cl"})

     */
    private $datenaissance;

    /**
     * @var string
     *
     *  @ORM\Column(name="email", type="string", length=50, nullable=false)
     * @Assert\NotBlank(message="please enter your email")
     * @Assert\Email()
     * @Groups({"cl"})

     * 
     * 
     */
    private $email;

    /**
     * @var int
     *
     * @ORM\Column(name="telephone", type="integer", nullable=false)
     * @Assert\NotNull(message="entrer votre numero")
     * @Assert\Length(
     *      min = 8,
     *      max = 8,
     *      minMessage = "least {{ limit }} characters long",
     *      maxMessage = "cannot be longer than {{ limit }} characters"
     * )
     * @Groups({"cl"})
     */
    private $telephone;

    /**
     *
     * @ORM\Column(name="password", type="string", length=50, nullable=false)
     * @Assert\NotBlank(message="entrer votre password")
     * @Assert\Length(min="6")
     * @var string The hashed password
     * @Groups({"cl"})

     */
    private $password;
     /**
     * @var string
     * @ORM\Column(type="string")
      * @Groups({"cl"})

      */
    private $roles;



    public function getIdPersonne(): ?int
    {
        return $this->idPersonne;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getDatenaissance(): ?\DateTimeInterface
    {
        return $this->datenaissance;
    }

    public function setDatenaissance(\DateTimeInterface $datenaissance): self
    {
        $this->datenaissance = $datenaissance;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getTelephone(): ?int
    {
        return $this->telephone;
    }

    public function setTelephone(int $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }
  

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function __toString()
    {
        return (string) $this->nom;
    }
    
    public function setRoles(string $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    public function getRoles(): ?string
    {
        return $this->roles;
    }
}
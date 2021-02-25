<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\UserRepository;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @ApiResource(
 *     normalizationContext={"groups"={"user:read"}},
 *     denormalizationContext={"groups"={"user:write"}},
 * collectionOperations={ 
 *  "post"={},
 *  "get"={}
 * },
 *  itemOperations={
 * "get"={},
 * "put"={},
 * "delete"={},
 * "patch"={}
 *  
 * }
 * )
 */
class User implements UserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     * @Groups({"user:read" ,"user:write"})
     */
    private $username;

    /**
     * @ORM\Column(type="json")
     * @Groups({"user:read" ,"user:write"})
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     * @Groups({"user:read" ,"user:write"})
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"user:read" ,"user:write"})
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"user:read" ,"user:write"})
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"user:read" ,"user:write"})
     */
    private $phone;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"user:read" ,"user:write"})
     */
    private $CNI;

    /**
     * @ORM\Column(type="blob")
     * @Groups({"user:read" ,"user:write"})
     */
    private $avatar;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"user:read" ,"user:write"})
     */
    private $adress;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"user:read" ,"user:write"})
     */
    private $archivage;

    /**
     * @ORM\ManyToOne(targetEntity=agence::class, inversedBy="users")
     * @Groups({"user:read" ,"user:write"})
     */
    private $agence;

    /**
     * @ORM\ManyToOne(targetEntity=Profil::class, inversedBy="user")
     * @Groups({"user:read" ,"user:write"})
     */
    private $profil;

    /**
     * @ORM\OneToMany(targetEntity=transaction::class, mappedBy="deposer")
     * @Groups({"user:read" ,"user:write"})
     */
    private $transaction;

    /**
     * @ORM\OneToMany(targetEntity=compte::class, mappedBy="user")
     * @Groups({"user:read" ,"user:write"})
     */
    private $compte;

    /**
     * @ORM\OneToOne(targetEntity=depot::class, cascade={"persist", "remove"})
     */
    private $depot;

    public function __construct()
    {
        $this->transaction = new ArrayCollection();
        $this->compte = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return (string) $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Returning a salt is only needed, if you are not using a modern
     * hashing algorithm (e.g. bcrypt or sodium) in your security.yaml.
     *
     * @see UserInterface
     */
    public function getSalt(): ?string
    {
        return null;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
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

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getCNI(): ?string
    {
        return $this->CNI;
    }

    public function setCNI(string $CNI): self
    {
        $this->CNI = $CNI;

        return $this;
    }

    public function getAvatar()
    {
        return $this->avatar;
    }

    public function setAvatar($avatar): self
    {
        $this->avatar = $avatar;

        return $this;
    }

    public function getAdress(): ?string
    {
        return $this->adress;
    }

    public function setAdress(string $adress): self
    {
        $this->adress = $adress;

        return $this;
    }

    public function getArchivage(): ?string
    {
        return $this->archivage;
    }

    public function setArchivage(?string $archivage): self
    {
        $this->archivage = $archivage;

        return $this;
    }

    public function getAgence(): ?agence
    {
        return $this->agence;
    }

    public function setAgence(?agence $agence): self
    {
        $this->agence = $agence;

        return $this;
    }

    public function getProfil(): ?Profil
    {
        return $this->profil;
    }

    public function setProfil(?Profil $profil): self
    {
        $this->profil = $profil;

        return $this;
    }

    /**
     * @return Collection|transaction[]
     */
    public function getTransaction(): Collection
    {
        return $this->transaction;
    }

    public function addTransaction(transaction $transaction): self
    {
        if (!$this->transaction->contains($transaction)) {
            $this->transaction[] = $transaction;
            $transaction->setDeposer($this);
        }

        return $this;
    }

    public function removeTransaction(transaction $transaction): self
    {
        if ($this->transaction->removeElement($transaction)) {
            // set the owning side to null (unless already changed)
            if ($transaction->getDeposer() === $this) {
                $transaction->setDeposer(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|compte[]
     */
    public function getCompte(): Collection
    {
        return $this->compte;
    }

    public function addCompte(compte $compte): self
    {
        if (!$this->compte->contains($compte)) {
            $this->compte[] = $compte;
            $compte->setUser($this);
        }

        return $this;
    }

    public function removeCompte(compte $compte): self
    {
        if ($this->compte->removeElement($compte)) {
            // set the owning side to null (unless already changed)
            if ($compte->getUser() === $this) {
                $compte->setUser(null);
            }
        }

        return $this;
    }

    public function getDepot(): ?depot
    {
        return $this->depot;
    }

    public function setDepot(?depot $depot): self
    {
        $this->depot = $depot;

        return $this;
    }
}

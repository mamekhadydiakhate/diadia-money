<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\TransactionRepository;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * @ORM\Entity(repositoryClass=TransactionRepository::class)
 * @ApiResource(
 *     normalizationContext={"groups"={"transaction:read"}},
 *     denormalizationContext={"groups"={"transaction:write"}},
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
class Transaction
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $montant;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateDepot;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $dateRetrait;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateAnnulation;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $TTC;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $fraisEtat;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $fraisSysteme;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $fraisEnvoie;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $fraisRetrait;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $codeTransaction;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="transaction")
     */
    private $deposer;

    /**
     * @ORM\ManyToOne(targetEntity=Compte::class, inversedBy="transaction")
     */
    private $compte;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMontant(): ?string
    {
        return $this->montant;
    }

    public function setMontant(string $montant): self
    {
        $this->montant = $montant;

        return $this;
    }

    public function getDateDepot(): ?\DateTimeInterface
    {
        return $this->dateDepot;
    }

    public function setDateDepot(\DateTimeInterface $dateDepot): self
    {
        $this->dateDepot = $dateDepot;

        return $this;
    }

    public function getDateRetrait(): ?string
    {
        return $this->dateRetrait;
    }

    public function setDateRetrait(string $dateRetrait): self
    {
        $this->dateRetrait = $dateRetrait;

        return $this;
    }

    public function getDateAnnulation(): ?\DateTimeInterface
    {
        return $this->dateAnnulation;
    }

    public function setDateAnnulation(\DateTimeInterface $dateAnnulation): self
    {
        $this->dateAnnulation = $dateAnnulation;

        return $this;
    }

    public function getTTC(): ?string
    {
        return $this->TTC;
    }

    public function setTTC(?string $TTC): self
    {
        $this->TTC = $TTC;

        return $this;
    }

    public function getFraisEtat(): ?string
    {
        return $this->fraisEtat;
    }

    public function setFraisEtat(?string $fraisEtat): self
    {
        $this->fraisEtat = $fraisEtat;

        return $this;
    }

    public function getFraisSysteme(): ?string
    {
        return $this->fraisSysteme;
    }

    public function setFraisSysteme(?string $fraisSysteme): self
    {
        $this->fraisSysteme = $fraisSysteme;

        return $this;
    }

    public function getFraisEnvoie(): ?string
    {
        return $this->fraisEnvoie;
    }

    public function setFraisEnvoie(?string $fraisEnvoie): self
    {
        $this->fraisEnvoie = $fraisEnvoie;

        return $this;
    }

    public function getFraisRetrait(): ?string
    {
        return $this->fraisRetrait;
    }

    public function setFraisRetrait(string $fraisRetrait): self
    {
        $this->fraisRetrait = $fraisRetrait;

        return $this;
    }

    public function getCodeTransaction(): ?string
    {
        return $this->codeTransaction;
    }

    public function setCodeTransaction(string $codeTransaction): self
    {
        $this->codeTransaction = $codeTransaction;

        return $this;
    }

    public function getDeposer(): ?User
    {
        return $this->deposer;
    }

    public function setDeposer(?User $deposer): self
    {
        $this->deposer = $deposer;

        return $this;
    }

    public function getCompte(): ?Compte
    {
        return $this->compte;
    }

    public function setCompte(?Compte $compte): self
    {
        $this->compte = $compte;

        return $this;
    }
}

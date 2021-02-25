<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\DepotRepository;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * @ORM\Entity(repositoryClass=DepotRepository::class)
 * @ApiResource(
 *     normalizationContext={"groups"={"depot:read"}},
 *     denormalizationContext={"groups"={"depot:write"}},
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
class Depot
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $dateDepot;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $motantDepot;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getMotantDepot(): ?string
    {
        return $this->motantDepot;
    }

    public function setMotantDepot(string $motantDepot): self
    {
        $this->motantDepot = $motantDepot;

        return $this;
    }
}

<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DepotRepository")
 */
class Depot
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $montantDéposé;

     /**
     * @ORM\Column(type="datetime")
     */
    private $dateDépot;

  

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Compte", inversedBy="depots")
     */
    private $compte;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Utilisateur", inversedBy="depots")
     */
    private $utilisateur;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMontantDéposé(): ?int
    {
        return $this->montantDéposé;
    }

    public function setMontantDéposé(int $montantDéposé): self
    {
        $this->montantDéposé = $montantDéposé;

        return $this;
    }

    public function getDateDépot(): ?\DateTimeInterface
    {
        return $this->dateDépot;
    }

    public function setDateDépot(\DateTimeInterface $dateDépot): self
    {
        $this->dateDépot = $dateDépot;

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

    public function getUtilisateur(): ?Utilisateur
    {
        return $this->utilisateur;
    }

    public function setUtilisateur(?Utilisateur $utilisateur): self
    {
        $this->utilisateur = $utilisateur;

        return $this;
    }
}

<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\VisiteRepository")
 */
class Visite
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $dateVisite;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $cercle;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $commune;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $douar;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $centre;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Utilisateur;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateVisite(): ?\DateTimeInterface
    {
        return $this->dateVisite;
    }

    public function setDateVisite(\DateTimeInterface $dateVisite): self
    {
        $this->dateVisite = $dateVisite;

        return $this;
    }

    public function getCercle(): ?string
    {
        return $this->cercle;
    }

    public function setCercle(string $cercle): self
    {
        $this->cercle = $cercle;

        return $this;
    }

    public function getCommune(): ?string
    {
        return $this->commune;
    }

    public function setCommune(string $commune): self
    {
        $this->commune = $commune;

        return $this;
    }

    public function getDouar(): ?string
    {
        return $this->douar;
    }

    public function setDouar(string $douar): self
    {
        $this->douar = $douar;

        return $this;
    }

    public function getCentre(): ?string
    {
        return $this->centre;
    }

    public function setCentre(?string $centre): self
    {
        $this->centre = $centre;

        return $this;
    }

    public function getUtilisateur(): ?string
    {
        return $this->Utilisateur;
    }

    public function setUtilisateur(string $Utilisateur): self
    {
        $this->Utilisateur = $Utilisateur;

        return $this;
    }
}

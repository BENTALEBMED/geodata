<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ConsultationRepository")
 */
class Consultation
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
    private $dateConsultation;

    /**
     * @ORM\Column(type="float")
     */
    private $poids;

    /**
     * @ORM\Column(type="float")
     */
    private $taille;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $motif;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Enfant", inversedBy="consultations")
     */
    private $enfant;

   
    /**
     * @ORM\Column(type="string", length=3)
     */
    private $retard;

    /**
     * @ORM\Column(type="integer")
     */
    private $age;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $centreSoins;

    /**
     * @ORM\Column(type="string", length=5, nullable=true)
     */
    private $retardgrave;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateConsultation(): ?\DateTimeInterface
    {
        return $this->dateConsultation;
    }

    public function setDateConsultation(\DateTimeInterface $dateConsultation): self
    {
        $this->dateConsultation = $dateConsultation;

        return $this;
    }

    public function getPoids(): ?float
    {
        return $this->poids;
    }

    public function setPoids(float $poids): self
    {
        $this->poids = $poids;

        return $this;
    }

    public function getTaille(): ?float
    {
        return $this->taille;
    }

    public function setTaille(float $taille): self
    {
        $this->taille = $taille;

        return $this;
    }

    public function getMotif(): ?string
    {
        return $this->motif;
    }

    public function setMotif(?string $motif): self
    {
        $this->motif = $motif;

        return $this;
    }

    public function getEnfant(): ?Enfant
    {
        return $this->enfant;
    }

    public function setEnfant(?Enfant $enfant): self
    {
        $this->enfant = $enfant;

        return $this;
    }

   
    public function getRetard(): ?string
    {
        return $this->retard;
    }

    public function setRetard(string $retard): self
    {
        $this->retard = $retard;

        return $this;
    }

    public function getAge(): ?int
    {
        return $this->age;
    }

    public function setAge(int $age): self
    {
        $this->age = $age;

        return $this;
    }

    public function getCentreSoins(): ?string
    {
        return $this->centreSoins;
    }

    public function setCentreSoins(string $centreSoins): self
    {
        $this->centreSoins = $centreSoins;

        return $this;
    }

    public function getRetardgrave(): ?string
    {
        return $this->retardgrave;
    }

    public function setRetardgrave(?string $retardgrave): self
    {
        $this->retardgrave = $retardgrave;

        return $this;
    }
}

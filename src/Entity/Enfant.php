<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EnfantRepository")
 */
class Enfant
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $smi;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $sexe;

    /**
     * @ORM\Column(type="date")
     */
    private $dateNaissance;

    /**
     * @ORM\Column(type="string", length=30, nullable=true)
     */
    private $cinPereMere;

    

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $accouchement;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $durreeAllaitement;

    
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Mere", inversedBy="consultations")
     */
    private $meres;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Consultation", mappedBy="enfant")
     */
    private $consultations;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Douar", inversedBy="enfants")
     */
    private $douars;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nbrcpn;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $fer;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $vitamineD;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $acideFolique;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $suppNutri;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $motifDGross;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $datedernieracc;

    public function __construct()
    {
        $this->consultations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSmi(): ?string
    {
        return $this->smi;
    }

    public function setSmi(string $smi): self
    {
        $this->smi = $smi;

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

    public function getSexe(): ?string
    {
        return $this->sexe;
    }

    public function setSexe(string $sexe): self
    {
        $this->sexe = $sexe;

        return $this;
    }

    public function getDateNaissance(): ?\DateTimeInterface
    {
        return $this->dateNaissance;
    }

    public function setDateNaissance(\DateTimeInterface $dateNaissance): self
    {
        $this->dateNaissance = $dateNaissance;

        return $this;
    }

    public function getCinPereMere(): ?string
    {
        return $this->cinPereMere;
    }

    public function setCinPereMere(?string $cinPereMere): self
    {
        $this->cinPereMere = $cinPereMere;

        return $this;
    }

   

    public function getAccouchement(): ?string
    {
        return $this->accouchement;
    }

    public function setAccouchement(string $accouchement): self
    {
        $this->accouchement = $accouchement;

        return $this;
    }

    public function getDurreeAllaitement(): ?string
    {
        return $this->durreeAllaitement;
    }

    public function setDurreeAllaitement(?string $durreeAllaitement): self
    {
        $this->durreeAllaitement = $durreeAllaitement;

        return $this;
    }

   

    public function getMeres(): ?Mere
    {
        return $this->meres;
    }

    public function setMeres(?Mere $meres): self
    {
        $this->meres = $meres;

        return $this;
    }

    /**
     * @return Collection|Consultation[]
     */
    public function getConsultations(): Collection
    {
        return $this->consultations;
    }

    public function addConsultation(Consultation $consultation): self
    {
        if (!$this->consultations->contains($consultation)) {
            $this->consultations[] = $consultation;
            $consultation->setEnfant($this);
        }

        return $this;
    }

    public function removeConsultation(Consultation $consultation): self
    {
        if ($this->consultations->contains($consultation)) {
            $this->consultations->removeElement($consultation);
            // set the owning side to null (unless already changed)
            if ($consultation->getEnfant() === $this) {
                $consultation->setEnfant(null);
            }
        }

        return $this;
    }

    public function getDouars(): ?Douar
    {
        return $this->douars;
    }

    public function setDouars(?Douar $douars): self
    {
        $this->douars = $douars;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getNbrcpn(): ?string
    {
        return $this->nbrcpn;
    }

    public function setNbrcpn(string $nbrcpn): self
    {
        $this->nbrcpn = $nbrcpn;

        return $this;
    }

    public function getFer(): ?string
    {
        return $this->fer;
    }

    public function setFer(?string $fer): self
    {
        $this->fer = $fer;

        return $this;
    }

    public function getVitamineD(): ?string
    {
        return $this->vitamineD;
    }

    public function setVitamineD(?string $vitamineD): self
    {
        $this->vitamineD = $vitamineD;

        return $this;
    }

    public function getAcideFolique(): ?string
    {
        return $this->acideFolique;
    }

    public function setAcideFolique(?string $acideFolique): self
    {
        $this->acideFolique = $acideFolique;

        return $this;
    }

    public function getSuppNutri(): ?string
    {
        return $this->suppNutri;
    }

    public function setSuppNutri(?string $suppNutri): self
    {
        $this->suppNutri = $suppNutri;

        return $this;
    }

    public function getMotifDGross(): ?string
    {
        return $this->motifDGross;
    }

    public function setMotifDGross(?string $motifDGross): self
    {
        $this->motifDGross = $motifDGross;

        return $this;
    }

    public function getDatedernieracc(): ?string
    {
        return $this->datedernieracc;
    }

    public function setDatedernieracc(?string $datedernieracc): self
    {
        $this->datedernieracc = $datedernieracc;

        return $this;
    }
}

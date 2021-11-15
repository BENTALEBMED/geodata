<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MereRepository")
 */
class Mere
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100,nullable=true)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=100,nullable=true)
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=100,nullable=true)
     */
    private $age;

    
    

   
    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Enfant", mappedBy="meres")
     */
    private $enfants;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $tel;

       
    public function __construct()
    {
        $this->enfants = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getAge(): ?string
    {
        return $this->age;
    }

    public function setAge(string $age): self
    {
        $this->age = $age;

        return $this;
    }

   

   
       
    /**
     * @return Collection|Enfant[]
     */
    public function getenfants(): Collection
    {
        return $this->enfants;
    }

    public function addenfants(Enfant $enfants): self
    {
        if (!$this->enfants->contains($enfants)) {
            $this->enfants[] = $enfants;
            $enfants->setMeres($this);
        }

        return $this;
    }

    public function removeenfants(Enfant $enfants): self
    {
        if ($this->enfants->contains($enfants)) {
            $this->consultations->removeElement($enfants);
            // set the owning side to null (unless already changed)
            if ($enfants->getMeres() === $this) {
                $enfants->setMeres(null);
            }
        }

        return $this;
    }

    public function getTel(): ?string
    {
        return $this->tel;
    }

    public function setTel(?string $tel): self
    {
        $this->tel = $tel;

        return $this;
    }

    
}

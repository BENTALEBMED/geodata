<?php

namespace App\Entity;

use App\Repository\BasedonneeRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BasedonneeRepository::class)
 */
class Basedonnee
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $cercle;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $commune;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $centre_de_soin;

    /**
     * @ORM\Column(type="date")
     */
    private $date_de_mesures;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $smi;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $nom_enfant;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $prenom_enfant;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $sexe;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $douar;

    /**
     * @ORM\Column(type="date")
     */
    private $date_naissance_enfant;

    /**
     * @ORM\Column(type="integer")
     */
    private $age;

    /**
     * @ORM\Column(type="float")
     */
    private $poids;

    /**
     * @ORM\Column(type="float")
     */
    private $taille;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $imc;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $retard_croissance;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $prise_vitamined_pend_6mois;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $prise_vitaminea_pend_6mois;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $Prise_Fer_pend_6mois;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $Nom_parent;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $prenom_parent;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $tel_parent;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $date_naissance_mere;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $CPN;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Prise_Fer_pend_grossesse;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $prisevitamineD;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $priseacidefolique;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $motif_danger;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $accouchement_enfanta;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Duree_allaitement;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $dateprecedentenaissance;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $aliments_avant_6moisa;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $setutilisauseindumenage;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $part_farine_traditionnelle;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $part_farine_industrielle;

    

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCercle(): ?string
    {
        return $this->cercle;
    }

    public function setCercle(string $cercle): self
    {
        $this->cercle = $cerecle;

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

    public function getCentreDeSoin(): ?string
    {
        return $this->centre_de_soin;
    }

    public function setCentreDeSoin(string $centre_de_soin): self
    {
        $this->centre_de_soin = $centre_de_soin;

        return $this;
    }

    public function getDateDeMesures(): ?\DateTimeInterface
    {
        return $this->date_de_mesures;
    }

    public function setDateDeMesures(\DateTimeInterface $date_de_mesures): self
    {
        $this->date_de_mesures = $date_de_mesures;

        return $this;
    }

    public function getSmi(): ?string
    {
        return $this->smi;
    }

    public function setSmi(?string $smi): self
    {
        $this->smi = $smi;

        return $this;
    }

    public function getNomEnfant(): ?string
    {
        return $this->nom_enfant;
    }

    public function setNomEnfant(string $nom_enfant): self
    {
        $this->nom_enfant = $nom_enfant;

        return $this;
    }

    public function getPrenomEnfant(): ?string
    {
        return $this->prenom_enfant;
    }

    public function setPrenomEnfant(string $prenom_enfant): self
    {
        $this->prenom_enfant = $prenom_enfant;

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

    public function getDouar(): ?string
    {
        return $this->douar;
    }

    public function setDouar(string $douar): self
    {
        $this->douar = $douar;

        return $this;
    }

    public function getDateNaissanceEnfant(): ?\DateTimeInterface
    {
        return $this->date_naissance_enfant;
    }

    public function setDateNaissanceEnfant(\DateTimeInterface $date_naissance_enfant): self
    {
        $this->date_naissance_enfant = $date_naissance_enfant;

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

    public function getImc(): ?float
    {
        return $this->imc;
    }

    public function setImc(?float $imc): self
    {
        $this->imc = $imc;

        return $this;
    }

    public function getRetardCroissance(): ?string
    {
        return $this->retard_croissance;
    }

    public function setRetardCroissance(string $retard_croissance): self
    {
        $this->retard_croissance = $retard_croissance;

        return $this;
    }

    public function getPriseVitaminedPend6mois(): ?string
    {
        return $this->prise_vitamined_pend_6mois;
    }

    public function setPriseVitaminedPend6mois(?string $prise_vitamined_pend_6mois): self
    {
        $this->prise_vitamined_pend_6mois = $prise_vitamined_pend_6mois;

        return $this;
    }

    public function getPriseVitamineaPend6mois(): ?string
    {
        return $this->prise_vitaminea_pend_6mois;
    }

    public function setPriseVitamineaPend6mois(?string $prise_vitaminea_pend_6mois): self
    {
        $this->prise_vitaminea_pend_6mois = $prise_vitaminea_pend_6mois;

        return $this;
    }

    public function getPriseFerPend6mois(): ?string
    {
        return $this->Prise_Fer_pend_6mois;
    }

    public function setPriseFerPend6mois(?string $Prise_Fer_pend_6mois): self
    {
        $this->Prise_Fer_pend_6mois = $Prise_Fer_pend_6mois;

        return $this;
    }

    public function getNomParent(): ?string
    {
        return $this->Nom_parent;
    }

    public function setNomParent(?string $Nom_parent): self
    {
        $this->Nom_parent = $Nom_parent;

        return $this;
    }

    public function getPrenomParent(): ?string
    {
        return $this->prenom_parent;
    }

    public function setPrenomParent(?string $prenom_parent): self
    {
        $this->prenom_parent = $prenom_parent;

        return $this;
    }

    public function getTelParent(): ?string
    {
        return $this->tel_parent;
    }

    public function setTelParent(?string $tel_parent): self
    {
        $this->tel_parent = $tel_parent;

        return $this;
    }

    public function getDateNaissanceMere(): ?string
    {
        return $this->date_naissance_mere;
    }

    public function setDateNaissanceMere(?string $date_naissance_mere): self
    {
        $this->date_naissance_mere = $date_naissance_mere;

        return $this;
    }

    public function getCPN(): ?int
    {
        return $this->CPN;
    }

    public function setCPN(?int $CPN): self
    {
        $this->CPN = $CPN;

        return $this;
    }

    public function getPriseFerPendGrossesse(): ?string
    {
        return $this->Prise_Fer_pend_grossesse;
    }

    public function setPriseFerPendGrossesse(?string $Prise_Fer_pend_grossesse): self
    {
        $this->Prise_Fer_pend_grossesse = $Prise_Fer_pend_grossesse;

        return $this;
    }

    public function getPrisevitamineD(): ?string
    {
        return $this->prisevitamineD;
    }

    public function setPrisevitamineD(string $prisevitamineD): self
    {
        $this->prisevitamineD = $prisevitamineD;

        return $this;
    }

    public function getPriseacidefolique(): ?string
    {
        return $this->priseacidefolique;
    }

    public function setPriseacidefolique(?string $priseacidefolique): self
    {
        $this->priseacidefolique = $priseacidefolique;

        return $this;
    }

    public function getMotifDanger(): ?string
    {
        return $this->motif_danger;
    }

    public function setMotifDanger(?string $motif_danger): self
    {
        $this->motif_danger = $motif_danger;

        return $this;
    }

    public function getAccouchementEnfanta(): ?string
    {
        return $this->accouchement_enfanta;
    }

    public function setAccouchementEnfanta(?string $accouchement_enfanta): self
    {
        $this->accouchement_enfanta = $accouchement_enfanta;

        return $this;
    }

    public function getDureeAllaitement(): ?string
    {
        return $this->Duree_allaitement;
    }

    public function setDureeAllaitement(?string $Duree_allaitement): self
    {
        $this->Duree_allaitement = $Duree_allaitement;

        return $this;
    }

    public function getDateprecedentenaissance(): ?string
    {
        return $this->dateprecedentenaissance;
    }

    public function setDateprecedentenaissance(?string $dateprecedentenaissance): self
    {
        $this->dateprecedentenaissance = $dateprecedentenaissance;

        return $this;
    }

    public function getAlimentsAvant6moisa(): ?string
    {
        return $this->aliments_avant_6moisa;
    }

    public function setAlimentsAvant6moisa(?string $aliments_avant_6moisa): self
    {
        $this->aliments_avant_6moisa = $aliments_avant_6moisa;

        return $this;
    }

    public function getSetutilisauseindumenage(): ?string
    {
        return $this->setutilisauseindumenage;
    }

    public function setSetutilisauseindumenage(?string $setutilisauseindumenage): self
    {
        $this->setutilisauseindumenage = $setutilisauseindumenage;

        return $this;
    }

    public function getPartFarineTraditionnelle(): ?string
    {
        return $this->part_farine_traditionnelle;
    }

    public function setPartFarineTraditionnelle(?string $part_farine_traditionnelle): self
    {
        $this->part_farine_traditionnelle = $part_farine_traditionnelle;

        return $this;
    }

    public function getPartFarineIndustrielle(): ?string
    {
        return $this->part_farine_industrielle;
    }

    public function setPartFarineIndustrielle(?string $part_farine_industrielle): self
    {
        $this->part_farine_industrielle = $part_farine_industrielle;

        return $this;
    }

  
}

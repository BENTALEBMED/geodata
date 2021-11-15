<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\StandardsRepository")
 */
class Standards
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=5)
     */
    private $yearMonth;

    /**
     * @ORM\Column(type="string", length=1)
     */
    private $sexe;

    /**
     * @ORM\Column(type="integer")
     */
    private $month;

    /**
     * @ORM\Column(type="integer")
     */
    private $l;

    /**
     * @ORM\Column(type="string", length=8)
     */
    private $m;

    /**
     * @ORM\Column(type="string", length=7)
     */
    private $s;

    /**
     * @ORM\Column(type="string", length=6)
     */
    private $sd;

    /**
     * @ORM\Column(type="string", length=4)
     */
    private $n3sd;

    /**
     * @ORM\Column(type="string", length=5)
     */
    private $n2sd;

    /**
     * @ORM\Column(type="string", length=5)
     */
    private $n1sd;

    /**
     * @ORM\Column(type="string", length=5)
     */
    private $median;

    /**
     * @ORM\Column(type="string", length=5)
     */
    private $p1sd;

    /**
     * @ORM\Column(type="string", length=5)
     */
    private $p2sd;

    /**
     * @ORM\Column(type="string", length=5)
     */
    private $p3sd;

    /**
     * @ORM\Column(type="integer")
     */
    private $jours;

    /**
     * @ORM\Column(type="string", length=11)
     */
    private $b_2sd;

    /**
     * @ORM\Column(type="string", length=11)
     */
    private $a_2sd;

    /**
     * @ORM\Column(type="string", length=11)
     */
    private $b_3sd;

    /**
     * @ORM\Column(type="string", length=11)
     */
    private $a_3sd;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getYearMonth(): ?string
    {
        return $this->yearMonth;
    }

    public function setYearMonth(string $yearMonth): self
    {
        $this->yearMonth = $yearMonth;

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

    public function getMonth(): ?int
    {
        return $this->month;
    }

    public function setMonth(int $month): self
    {
        $this->month = $month;

        return $this;
    }

    public function getL(): ?int
    {
        return $this->l;
    }

    public function setL(int $l): self
    {
        $this->l = $l;

        return $this;
    }

    public function getM(): ?string
    {
        return $this->m;
    }

    public function setM(string $m): self
    {
        $this->m = $m;

        return $this;
    }

    public function getS(): ?string
    {
        return $this->s;
    }

    public function setS(string $s): self
    {
        $this->s = $s;

        return $this;
    }

    public function getSd(): ?string
    {
        return $this->sd;
    }

    public function setSd(string $sd): self
    {
        $this->sd = $sd;

        return $this;
    }

    public function getN3sd(): ?string
    {
        return $this->n3sd;
    }

    public function setN3sd(string $n3sd): self
    {
        $this->n3sd = $n3sd;

        return $this;
    }

    public function getN2sd(): ?string
    {
        return $this->n2sd;
    }

    public function setN2sd(string $n2sd): self
    {
        $this->n2sd = $n2sd;

        return $this;
    }

    public function getN1sd(): ?string
    {
        return $this->n1sd;
    }

    public function setN1sd(string $n1sd): self
    {
        $this->n1sd = $n1sd;

        return $this;
    }

    public function getMedian(): ?string
    {
        return $this->median;
    }

    public function setMedian(string $median): self
    {
        $this->median = $median;

        return $this;
    }

    public function getP1sd(): ?string
    {
        return $this->p1sd;
    }

    public function setP1sd(string $p1sd): self
    {
        $this->p1sd = $p1sd;

        return $this;
    }

    public function getP2sd(): ?string
    {
        return $this->p2sd;
    }

    public function setP2sd(string $p2sd): self
    {
        $this->p2sd = $p2sd;

        return $this;
    }

    public function getP3sd(): ?string
    {
        return $this->p3sd;
    }

    public function setP3sd(string $p3sd): self
    {
        $this->p3sd = $p3sd;

        return $this;
    }

    public function getJours(): ?int
    {
        return $this->jours;
    }

    public function setJours(int $jours): self
    {
        $this->jours = $jours;

        return $this;
    }

    public function getB2sd(): ?string
    {
        return $this->b_2sd;
    }

    public function setB2sd(string $b_2sd): self
    {
        $this->b_2sd = $b_2sd;

        return $this;
    }

    public function getA2sd(): ?string
    {
        return $this->a_2sd;
    }

    public function setA2sd(string $a_2sd): self
    {
        $this->a_2sd = $a_2sd;

        return $this;
    }

    public function getB3sd(): ?string
    {
        return $this->b_3sd;
    }

    public function setB3sd(string $b_3sd): self
    {
        $this->b_3sd = $b_3sd;

        return $this;
    }

    public function getA3sd(): ?string
    {
        return $this->a_3sd;
    }

    public function setA3sd(string $a_3sd): self
    {
        $this->a_3sd = $a_3sd;

        return $this;
    }
}

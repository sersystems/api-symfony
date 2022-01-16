<?php

namespace App\Entity;

use App\Repository\PregunteroRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PregunteroRepository::class)
 */
class Preguntero
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity=Respondedero::class, mappedBy="preguntero")
     */
    private $respondederos;

    /**
     * @ORM\ManyToOne(targetEntity=evaluacion::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $evaluacion;

    /**
     * @ORM\ManyToOne(targetEntity=preguntaMultiple::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $pregunta_multiple;

    /**
     * @ORM\ManyToOne(targetEntity=preguntaDesarrollo::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $pregunta_desarrollo;

    public function __construct()
    {
        $this->respondederos = new ArrayCollection();
    }


    // ******************** METODOS GETTER & SETTER ******************** //
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|Respondedero[]
     */
    public function getRespondederos(): Collection
    {
        return $this->respondederos;
    }

    public function addRespondedero(Respondedero $respondedero): self
    {
        if (!$this->respondederos->contains($respondedero)) {
            $this->respondederos[] = $respondedero;
            $respondedero->setPreguntero($this);
        }

        return $this;
    }

    public function removeRespondedero(Respondedero $respondedero): self
    {
        if ($this->respondederos->removeElement($respondedero)) {
            if ($respondedero->getPreguntero() === $this) {
                $respondedero->setPreguntero(null);
            }
        }

        return $this;
    }

    public function getEvaluacion(): ?evaluacion
    {
        return $this->evaluacion;
    }

    public function setEvaluacion(?evaluacion $evaluacion): self
    {
        $this->evaluacion = $evaluacion;

        return $this;
    }

    public function getPreguntaMultiple(): ?preguntaMultiple
    {
        return $this->pregunta_multiple;
    }

    public function setPreguntaMultiple(?preguntaMultiple $pregunta_multiple): self
    {
        $this->pregunta_multiple = $pregunta_multiple;

        return $this;
    }

    public function getPreguntaDesarrollo(): ?preguntaDesarrollo
    {
        return $this->pregunta_desarrollo;
    }

    public function setPreguntaDesarrollo(?preguntaDesarrollo $pregunta_desarrollo): self
    {
        $this->pregunta_desarrollo = $pregunta_desarrollo;

        return $this;
    }
}

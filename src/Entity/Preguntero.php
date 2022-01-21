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
     * @ORM\ManyToOne(targetEntity=Evaluacion::class, inversedBy="pregunteros")
     * @ORM\JoinColumn(nullable=false)
     */
    private $evaluacion;

    /**
     * @ORM\ManyToOne(targetEntity=PreguntaMultiple::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $pregunta_multiple;

    /**
     * @ORM\ManyToOne(targetEntity=PreguntaDesarrollo::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $pregunta_desarrollo;


    // ************************** CONSTRUCTOR ************************** //
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
            // set the owning side to null (unless already changed)
            if ($respondedero->getPreguntero() === $this) {
                $respondedero->setPreguntero(null);
            }
        }

        return $this;
    }

    public function getEvaluacion(): ?Evaluacion
    {
        return $this->evaluacion;
    }

    public function setEvaluacion(?Evaluacion $evaluacion): self
    {
        $this->evaluacion = $evaluacion;

        return $this;
    }

    public function getPreguntaMultiple(): ?PreguntaMultiple
    {
        return $this->pregunta_multiple;
    }

    public function setPreguntaMultiple(?PreguntaMultiple $pregunta_multiple): self
    {
        $this->pregunta_multiple = $pregunta_multiple;

        return $this;
    }

    public function getPreguntaDesarrollo(): ?PreguntaDesarrollo
    {
        return $this->pregunta_desarrollo;
    }

    public function setPreguntaDesarrollo(?PreguntaDesarrollo $pregunta_desarrollo): self
    {
        $this->pregunta_desarrollo = $pregunta_desarrollo;

        return $this;
    }
}

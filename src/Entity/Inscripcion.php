<?php

namespace App\Entity;

use App\Repository\InscripcionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=InscripcionRepository::class)
 */
class Inscripcion
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
    private $fecha;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2, nullable=true)
     */
    private $promedio;

    /**
     * @ORM\ManyToOne(targetEntity=Camada::class, inversedBy="inscripcions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $camada;

    /**
     * @ORM\ManyToOne(targetEntity=Estudiante::class, inversedBy="inscripcions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $estudiante;

    /**
     * @ORM\OneToMany(targetEntity=Respondedero::class, mappedBy="inscripcion")
     */
    private $respondederos;


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

    public function getFecha(): ?\DateTimeInterface
    {
        return $this->fecha;
    }

    public function setFecha(\DateTimeInterface $fecha): self
    {
        $this->fecha = $fecha;

        return $this;
    }

    public function getPromedio(): ?string
    {
        return $this->promedio;
    }

    public function setPromedio(?string $promedio): self
    {
        $this->promedio = $promedio;

        return $this;
    }

    public function getCamada(): ?Camada
    {
        return $this->camada;
    }

    public function setCamada(?Camada $camada): self
    {
        $this->camada = $camada;

        return $this;
    }

    public function getEstudiante(): ?Estudiante
    {
        return $this->estudiante;
    }

    public function setEstudiante(?Estudiante $estudiante): self
    {
        $this->estudiante = $estudiante;

        return $this;
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
            $respondedero->setInscripcion($this);
        }

        return $this;
    }

    public function removeRespondedero(Respondedero $respondedero): self
    {
        if ($this->respondederos->removeElement($respondedero)) {
            if ($respondedero->getInscripcion() === $this) {
                $respondedero->setInscripcion(null);
            }
        }

        return $this;
    }
}

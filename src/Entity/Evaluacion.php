<?php

namespace App\Entity;

use App\Repository\EvaluacionRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EvaluacionRepository::class)
 */
class Evaluacion
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=25)
     */
    private $nombre;

    /**
     * @ORM\Column(type="date")
     */
    private $fecha;

    /**
     * @ORM\Column(type="integer")
     */
    private $duracion;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2, nullable=true)
     */
    private $puntaje;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2)
     */
    private $puntaje_min;

    /**
     * @ORM\Column(type="boolean")
     */
    private $visibilidad;

    /**
     * @ORM\Column(type="boolean")
     */
    private $inicializada;

    /**
     * @ORM\Column(type="boolean")
     */
    private $finalizada;

    /**
     * @ORM\ManyToOne(targetEntity=materia::class, inversedBy="evaluaciones")
     * @ORM\JoinColumn(nullable=false)
     */
    private $materia;


    // ******************** METODOS GETTER & SETTER ******************** //
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
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

    public function getDuracion(): ?int
    {
        return $this->duracion;
    }

    public function setDuracion(int $duracion): self
    {
        $this->duracion = $duracion;

        return $this;
    }

    public function getPuntaje(): ?string
    {
        return $this->puntaje;
    }

    public function setPuntaje(string $puntaje): self
    {
        $this->puntaje = $puntaje;

        return $this;
    }

    public function getPuntajeMin(): ?string
    {
        return $this->puntaje_min;
    }

    public function setPuntajeMin(?string $puntaje_min): self
    {
        $this->puntaje_min = $puntaje_min;

        return $this;
    }

    public function getVisibilidad(): ?bool
    {
        return $this->visibilidad;
    }

    public function setVisibilidad(bool $visibilidad): self
    {
        $this->visibilidad = $visibilidad;

        return $this;
    }

    public function getInicializada(): ?bool
    {
        return $this->inicializada;
    }

    public function setInicializada(bool $inicializada): self
    {
        $this->inicializada = $inicializada;

        return $this;
    }

    public function getFinalizada(): ?bool
    {
        return $this->finalizada;
    }

    public function setFinalizada(bool $finalizada): self
    {
        $this->finalizada = $finalizada;

        return $this;
    }

    public function getMateria(): ?materia
    {
        return $this->materia;
    }

    public function setMateria(?materia $materia): self
    {
        $this->materia = $materia;

        return $this;
    }
}

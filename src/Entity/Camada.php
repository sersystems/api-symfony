<?php

namespace App\Entity;

use App\Repository\CamadaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CamadaRepository::class)
 */
class Camada
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=20, unique=true)
     */
    private $codigo;

    /**
     * @ORM\Column(type="date")
     */
    private $inicio;

    /**
     * @ORM\Column(type="date")
     */
    private $cierre;

    /**
     * @ORM\Column(type="boolean")
     */
    private $visibilidad;

    /**
     * @ORM\ManyToOne(targetEntity=Materia::class, inversedBy="camadas")
     * @ORM\JoinColumn(nullable=false)
     */
    private $materia;

    /**
     * @ORM\OneToMany(targetEntity=Inscripcion::class, mappedBy="camada")
     */
    private $inscripciones;


    // ************************** CONSTRUCTOR ************************** //
    public function __construct()
    {
        $this->inscripciones = new ArrayCollection();
    }


    // ******************** METODOS GETTER & SETTER ******************** //
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCodigo(): ?string
    {
        return $this->codigo;
    }

    public function setCodigo(string $codigo): self
    {
        $this->codigo = $codigo;

        return $this;
    }

    public function getInicio(): ?\DateTimeInterface
    {
        return $this->inicio;
    }

    public function setInicio(\DateTimeInterface $inicio): self
    {
        $this->inicio = $inicio;

        return $this;
    }

    public function getCierre(): ?\DateTimeInterface
    {
        return $this->cierre;
    }

    public function setCierre(\DateTimeInterface $cierre): self
    {
        $this->cierre = $cierre;

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

    public function getMateria(): ?Materia
    {
        return $this->materia;
    }

    public function setMateria(?Materia $materia): self
    {
        $this->materia = $materia;

        return $this;
    }

    /**
     * @return Collection|Inscripcion[]
     */
    public function getinscripciones(): Collection
    {
        return $this->inscripciones;
    }

    public function addInscripcion(Inscripcion $inscripcion): self
    {
        if (!$this->inscripciones->contains($inscripcion)) {
            $this->inscripciones[] = $inscripcion;
            $inscripcion->setCamada($this);
        }

        return $this;
    }

    public function removeInscripcion(Inscripcion $inscripcion): self
    {
        if ($this->inscripciones->removeElement($inscripcion)) {
            if ($inscripcion->getCamada() === $this) {
                $inscripcion->setCamada(null);
            }
        }

        return $this;
    }

    public function addInscripcione(Inscripcion $inscripcione): self
    {
        if (!$this->inscripciones->contains($inscripcione)) {
            $this->inscripciones[] = $inscripcione;
            $inscripcione->setCamada($this);
        }

        return $this;
    }

    public function removeInscripcione(Inscripcion $inscripcione): self
    {
        if ($this->inscripciones->removeElement($inscripcione)) {
            // set the owning side to null (unless already changed)
            if ($inscripcione->getCamada() === $this) {
                $inscripcione->setCamada(null);
            }
        }

        return $this;
    }
}

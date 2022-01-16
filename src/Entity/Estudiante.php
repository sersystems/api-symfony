<?php

namespace App\Entity;

use App\Repository\EstudianteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EstudianteRepository::class)
 */
class Estudiante
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
    private $apellido;

    /**
     * @ORM\Column(type="string", length=25)
     */
    private $nombre;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $email;

    /**
     * @ORM\Column(type="boolean")
     */
    private $activo;

    /**
     * @ORM\ManyToOne(targetEntity=institucion::class, inversedBy="docentes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $institucion;

    /**
     * @ORM\OneToOne(targetEntity=user::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\OneToMany(targetEntity=Inscripcion::class, mappedBy="estudiante")
     */
    private $inscripciones;

    public function __construct()
    {
        $this->inscripciones = new ArrayCollection();
    }


    // ******************** METODOS GETTER & SETTER ******************** //
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getApellido(): ?string
    {
        return $this->apellido;
    }

    public function setApellido(string $apellido): self
    {
        $this->apellido = $apellido;

        return $this;
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

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getActivo(): ?bool
    {
        return $this->activo;
    }

    public function setActivo(bool $activo): self
    {
        $this->activo = $activo;

        return $this;
    }

    public function getInstitucion(): ?institucion
    {
        return $this->institucion;
    }

    public function setInstitucion(?institucion $institucion): self
    {
        $this->institucion = $institucion;

        return $this;
    }

    public function getUser(): ?user
    {
        return $this->user;
    }

    public function setUser(user $user): self
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return Collection|Inscripcion[]
     */
    public function getInscripciones(): Collection
    {
        return $this->inscripciones;
    }

    public function addInscripcion(Inscripcion $inscripcion): self
    {
        if (!$this->inscripciones->contains($inscripcion)) {
            $this->inscripciones[] = $inscripcion;
            $inscripcion->setEstudiante($this);
        }

        return $this;
    }

    public function removeInscripcion(Inscripcion $inscripcion): self
    {
        if ($this->inscripciones->removeElement($inscripcion)) {
            if ($inscripcion->getEstudiante() === $this) {
                $inscripcion->setEstudiante(null);
            }
        }

        return $this;
    }

    public function addInscripcione(Inscripcion $inscripcione): self
    {
        if (!$this->inscripciones->contains($inscripcione)) {
            $this->inscripciones[] = $inscripcione;
            $inscripcione->setEstudiante($this);
        }

        return $this;
    }

    public function removeInscripcione(Inscripcion $inscripcione): self
    {
        if ($this->inscripciones->removeElement($inscripcione)) {
            if ($inscripcione->getEstudiante() === $this) {
                $inscripcione->setEstudiante(null);
            }
        }

        return $this;
    }
}

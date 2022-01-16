<?php

namespace App\Entity;

use App\Repository\InstitucionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=InstitucionRepository::class)
 */
class Institucion
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $nombre;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $email;

    /**
     * @ORM\OneToMany(targetEntity=Docente::class, mappedBy="institucion")
     */
    private $docentes;

    public function __construct()
    {
        $this->docentes = new ArrayCollection();
    }


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

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return Collection|Docente[]
     */
    public function getDocentes(): Collection
    {
        return $this->docentes;
    }

    public function addDocente(Docente $docente): self
    {
        if (!$this->docentes->contains($docente)) {
            $this->docentes[] = $docente;
            $docente->setInstitucion($this);
        }

        return $this;
    }

    public function removeDocente(Docente $docente): self
    {
        if ($this->docentes->removeElement($docente)) {
            if ($docente->getInstitucion() === $this) {
                $docente->setInstitucion(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Estudiante[]
     */
    public function getEstudiantes(): Collection
    {
        return $this->estudiantes;
    }

    public function addEstudiante(Estudiante $estudiante): self
    {
        if (!$this->estudiantes->contains($estudiante)) {
            $this->estudiantes[] = $estudiante;
            $estudiante->setInstitucion($this);
        }

        return $this;
    }

    public function removeEstudiante(Estudiante $estudiante): self
    {
        if ($this->estudiantes->removeElement($estudiante)) {
            if ($estudiante->getInstitucion() === $this) {
                $estudiante->setInstitucion(null);
            }
        }

        return $this;
    }
}

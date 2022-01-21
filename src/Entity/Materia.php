<?php

namespace App\Entity;

use App\Repository\MateriaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MateriaRepository::class)
 */
class Materia
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
     * @ORM\OneToMany(targetEntity=Camada::class, mappedBy="materia")
     */
    private $camadas;

    /**
     * @ORM\OneToMany(targetEntity=Modulo::class, mappedBy="materia")
     */
    private $modulos;

    /**
     * @ORM\OneToMany(targetEntity=Evaluacion::class, mappedBy="materia")
     */
    private $evaluaciones;


    // ************************** CONSTRUCTOR ************************** //
    public function __construct()
    {
        $this->camadas = new ArrayCollection();
        $this->modulos = new ArrayCollection();
        $this->evaluaciones = new ArrayCollection();
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

    /**
     * @return Collection|Camada[]
     */
    public function getCamadas(): Collection
    {
        return $this->camadas;
    }

    public function addCamada(Camada $camada): self
    {
        if (!$this->camadas->contains($camada)) {
            $this->camadas[] = $camada;
            $camada->setMateria($this);
        }

        return $this;
    }

    public function removeCamada(Camada $camada): self
    {
        if ($this->camadas->removeElement($camada)) {
            if ($camada->getMateria() === $this) {
                $camada->setMateria(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Modulo[]
     */
    public function getModulos(): Collection
    {
        return $this->modulos;
    }

    public function addModulo(Modulo $modulo): self
    {
        if (!$this->modulos->contains($modulo)) {
            $this->modulos[] = $modulo;
            $modulo->setMateria($this);
        }

        return $this;
    }

    public function removeModulo(Modulo $modulo): self
    {
        if ($this->modulos->removeElement($modulo)) {
            if ($modulo->getMateria() === $this) {
                $modulo->setMateria(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Evaluacion[]
     */
    public function getEvaluaciones(): Collection
    {
        return $this->evaluaciones;
    }

    public function addEvaluacion(Evaluacion $evaluacion): self
    {
        if (!$this->evaluaciones->contains($evaluacion)) {
            $this->evaluaciones[] = $evaluacion;
            $evaluacion->setMateria($this);
        }

        return $this;
    }

    public function removeEvaluacion(Evaluacion $evaluacion): self
    {
        if ($this->evaluaciones->removeElement($evaluacion)) {
            if ($evaluacion->getMateria() === $this) {
                $evaluacion->setMateria(null);
            }
        }

        return $this;
    }

    public function addEvaluacione(Evaluacion $evaluacione): self
    {
        if (!$this->evaluaciones->contains($evaluacione)) {
            $this->evaluaciones[] = $evaluacione;
            $evaluacione->setMateria($this);
        }

        return $this;
    }

    public function removeEvaluacione(Evaluacion $evaluacione): self
    {
        if ($this->evaluaciones->removeElement($evaluacione)) {
            // set the owning side to null (unless already changed)
            if ($evaluacione->getMateria() === $this) {
                $evaluacione->setMateria(null);
            }
        }

        return $this;
    }
}

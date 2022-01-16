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
     * @ORM\OneToMany(targetEntity=Modulo::class, mappedBy="materia")
     */
    private $modulos;

    /**
     * @ORM\OneToMany(targetEntity=Camada::class, mappedBy="materia")
     */
    private $camadas;

    /**
     * @ORM\OneToMany(targetEntity=Equipo::class, mappedBy="materia")
     */
    private $equipos;

    /**
     * @ORM\OneToMany(targetEntity=Evaluacion::class, mappedBy="materia")
     */
    private $evaluaciones;


    // ************************** CONSTRUCTOR ************************** //
    public function __construct()
    {
        $this->modulos = new ArrayCollection();
        $this->camadas = new ArrayCollection();
        $this->equipos = new ArrayCollection();
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
     * @return Collection|Equipo[]
     */
    public function getEquipos(): Collection
    {
        return $this->equipos;
    }

    public function addEquipo(Equipo $equipo): self
    {
        if (!$this->equipos->contains($equipo)) {
            $this->equipos[] = $equipo;
            $equipo->setMateria($this);
        }

        return $this;
    }

    public function removeEquipo(Equipo $equipo): self
    {
        if ($this->equipos->removeElement($equipo)) {
            if ($equipo->getMateria() === $this) {
                $equipo->setMateria(null);
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
            if ($evaluacione->getMateria() === $this) {
                $evaluacione->setMateria(null);
            }
        }

        return $this;
    }
}

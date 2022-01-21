<?php

namespace App\Entity;

use App\Repository\EquipoRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EquipoRepository::class)
 */
class Equipo
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Docente::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $docente;

    /**
     * @ORM\ManyToOne(targetEntity=Materia::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $materia;


    // ******************** METODOS GETTER & SETTER ******************** //
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDocente(): ?Docente
    {
        return $this->docente;
    }

    public function setDocente(?Docente $docente): self
    {
        $this->docente = $docente;

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
}

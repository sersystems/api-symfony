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
     * @ORM\ManyToOne(targetEntity=docente::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $docente;

    /**
     * @ORM\ManyToOne(targetEntity=materia::class, inversedBy="equipos")
     * @ORM\JoinColumn(nullable=false)
     */
    private $materia;


    // ******************** METODOS GETTER & SETTER ******************** //
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDocente(): ?docente
    {
        return $this->docente;
    }

    public function setDocente(?docente $docente): self
    {
        $this->docente = $docente;

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

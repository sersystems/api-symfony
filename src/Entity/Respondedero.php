<?php

namespace App\Entity;

use App\Repository\RespondederoRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RespondederoRepository::class)
 */
class Respondedero
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $respuesta;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2)
     */
    private $puntaje;

    /**
     * @ORM\ManyToOne(targetEntity=inscripcion::class, inversedBy="respondederos")
     * @ORM\JoinColumn(nullable=false)
     */
    private $inscripcion;

    /**
     * @ORM\ManyToOne(targetEntity=preguntero::class, inversedBy="respondederos")
     * @ORM\JoinColumn(nullable=false)
     */
    private $preguntero;


    // ******************** METODOS GETTER & SETTER ******************** //
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRespuesta(): ?string
    {
        return $this->respuesta;
    }

    public function setRespuesta(?string $respuesta): self
    {
        $this->respuesta = $respuesta;

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

    public function getInscripcion(): ?inscripcion
    {
        return $this->inscripcion;
    }

    public function setInscripcion(?inscripcion $inscripcion): self
    {
        $this->inscripcion = $inscripcion;

        return $this;
    }

    public function getPreguntero(): ?preguntero
    {
        return $this->preguntero;
    }

    public function setPreguntero(?preguntero $preguntero): self
    {
        $this->preguntero = $preguntero;

        return $this;
    }
}

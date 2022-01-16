<?php

namespace App\Entity;

use App\Repository\RespuestaMultipleRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RespuestaMultipleRepository::class)
 */
class RespuestaMultiple
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $texto;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $imagen;

    /**
     * @ORM\Column(type="boolean")
     */
    private $correcta;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2)
     */
    private $puntaje;

    /**
     * @ORM\ManyToOne(targetEntity=PreguntaMultiple::class, inversedBy="respuestasMultiple")
     * @ORM\JoinColumn(nullable=false)
     */
    private $pregunta_multiple;


    // ******************** METODOS GETTER & SETTER ******************** //
    public function getTexto(): ?string
    {
        return $this->texto;
    }

    public function setTexto(string $texto): self
    {
        $this->texto = $texto;

        return $this;
    }

    public function getImagen(): ?string
    {
        return $this->imagen;
    }

    public function setImagen(?string $imagen): self
    {
        $this->imagen = $imagen;

        return $this;
    }

    public function getCorrecta(): ?bool
    {
        return $this->correcta;
    }

    public function setCorrecta(bool $correcta): self
    {
        $this->correcta = $correcta;

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

    public function getPreguntaMultiple(): ?PreguntaMultiple
    {
        return $this->pregunta_multiple;
    }

    public function setPreguntaMultiple(?PreguntaMultiple $pregunta_multiple): self
    {
        $this->pregunta_multiple = $pregunta_multiple;

        return $this;
    }

    public function getId(): ?int
    {
        return $this->id;
    }
}

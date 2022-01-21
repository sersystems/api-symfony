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
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $devolucion;

    /**
     * @ORM\Column(type="boolean")
     */
    private $es_correcta;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2)
     */
    private $puntaje;

    /**
     * @ORM\ManyToOne(targetEntity=PreguntaMultiple::class, inversedBy="respuestaMultiples")
     * @ORM\JoinColumn(nullable=false)
     */
    private $pregunta_multiple;


    // ******************** METODOS GETTER & SETTER ******************** //
    public function getId(): ?int
    {
        return $this->id;
    }

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

    public function getDevolucion(): ?string
    {
        return $this->devolucion;
    }

    public function setDevolucion(?string $devolucion): self
    {
        $this->devolucion = $devolucion;

        return $this;
    }

    public function getEsCorrecta(): ?bool
    {
        return $this->es_correcta;
    }

    public function setEsCorrecta(bool $es_correcta): self
    {
        $this->es_correcta = $es_correcta;

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
}
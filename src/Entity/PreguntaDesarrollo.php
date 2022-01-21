<?php

namespace App\Entity;

use App\Repository\PreguntaDesarrolloRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PreguntaDesarrolloRepository::class)
 */
class PreguntaDesarrollo
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
    private $pregunta;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $imagen;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     *
     */
    private $devolucion;

    /**
     * @ORM\ManyToOne(targetEntity=Modulo::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $modulo;


    // ******************** METODOS GETTER & SETTER ******************** //
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPregunta(): ?string
    {
        return $this->pregunta;
    }

    public function setPregunta(string $pregunta): self
    {
        $this->pregunta = $pregunta;

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

    public function getModulo(): ?Modulo
    {
        return $this->modulo;
    }

    public function setModulo(?Modulo $modulo): self
    {
        $this->modulo = $modulo;

        return $this;
    }
}

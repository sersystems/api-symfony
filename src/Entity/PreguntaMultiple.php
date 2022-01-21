<?php

namespace App\Entity;

use App\Repository\PreguntaMultipleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PreguntaMultipleRepository::class)
 */
class PreguntaMultiple
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
     * @ORM\ManyToOne(targetEntity=Modulo::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $modulo;

    /**
     * @ORM\OneToMany(targetEntity=RespuestaMultiple::class, mappedBy="pregunta_multiple")
     */
    private $respuestaMultiples;


    // ************************** CONSTRUCTOR ************************** //
    public function __construct()
    {
        $this->respuestaMultiples = new ArrayCollection();
    }


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

    public function getModulo(): ?Modulo
    {
        return $this->modulo;
    }

    public function setModulo(?Modulo $modulo): self
    {
        $this->modulo = $modulo;

        return $this;
    }

    /**
     * @return Collection|RespuestaMultiple[]
     */
    public function getRespuestaMultiples(): Collection
    {
        return $this->respuestaMultiples;
    }

    public function addRespuestaMultiple(RespuestaMultiple $respuestaMultiple): self
    {
        if (!$this->respuestaMultiples->contains($respuestaMultiple)) {
            $this->respuestaMultiples[] = $respuestaMultiple;
            $respuestaMultiple->setPreguntaMultiple($this);
        }

        return $this;
    }

    public function removeRespuestaMultiple(RespuestaMultiple $respuestaMultiple): self
    {
        if ($this->respuestaMultiples->removeElement($respuestaMultiple)) {
            if ($respuestaMultiple->getPreguntaMultiple() === $this) {
                $respuestaMultiple->setPreguntaMultiple(null);
            }
        }

        return $this;
    }
}

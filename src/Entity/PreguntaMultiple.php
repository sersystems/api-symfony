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
     * @ORM\OneToMany(targetEntity=RespuestaMultiple::class, mappedBy="pregunta_multiple", orphanRemoval=true)
     */
    private $respuestasMultiple;

    /**
     * @ORM\ManyToOne(targetEntity=Modulo::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $modulo;


    // ************************** CONSTRUCTOR ************************** //
    public function __construct()
    {
        $this->respuestasMultiple = new ArrayCollection();
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

    /**
     * @return Collection|RespuestaMultiple[]
     */
    public function getRespuestasMultiple(): Collection
    {
        return $this->respuestasMultiple;
    }

    public function addRespuestasMultiple(RespuestaMultiple $respuestasMultiple): self
    {
        if (!$this->respuestasMultiple->contains($respuestasMultiple)) {
            $this->respuestasMultiple[] = $respuestasMultiple;
            $respuestasMultiple->setPreguntaMultiple($this);
        }

        return $this;
    }

    public function removeRespuestasMultiple(RespuestaMultiple $respuestasMultiple): self
    {
        if ($this->respuestasMultiple->removeElement($respuestasMultiple)) {
            if ($respuestasMultiple->getPreguntaMultiple() === $this) {
                $respuestasMultiple->setPreguntaMultiple(null);
            }
        }

        return $this;
    }

    public function getModuloId(): ?Modulo
    {
        return $this->modulo;
    }

    public function setModuloId(?Modulo $modulo): self
    {
        $this->modulo = $modulo;

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

<?php

namespace App\Service;

use App\Entity\Institucion;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class InstitucionService
{
    protected $em;
    protected $validator;
    protected $statu   = true;
    protected $message = 'Operación concluida con éxito.';
    protected $errors  = null;

    public function __construct(EntityManagerInterface $em, ValidatorInterface $validator)
    {
        $this->em = $em;
        $this->validator = $validator;
    }

    // Crea una nueva institución
    public function create(array $data)
    {
        $institucion = new Institucion();
        $institucion->setNombre($data['nombre']);
        $institucion->setEmail($data['email']);

        if ($this->validateEntity($institucion)) {
            $this->em->persist($institucion);
            $this->em->flush();
        }

        return [
            'statu'       => $this->statu,
            'message'     => $this->message,
            'errors'      => $this->errors,
            'institucion' => $institucion,
        ];

    }

    // Edita una institución en específico
    public function edit(int $id, array $data): array
    {
        $institucion = $this->em->getRepository(Institucion::class)->find($id);

        if ($institucion) {
            $institucion->setNombre($data['nombre']);
            $institucion->setEmail($data['email']);
            if ($this->validateEntity($institucion)) {
                $this->em->persist($institucion);
                $this->em->flush();
            }
        }else{
            $this->statu   = false;
            $this->message = 'Operación fallida. Objeto no editado.';
            $this->errors  = 'Object not found.';
        }

        return [
            'statu'       => $this->statu,
            'message'     => $this->message,
            'errors'      => $this->errors,
            'institucion' => $institucion,
        ];
    }

    // Borra una institución en específico
    public function delete(int $id): array
    {
        $institucion = $this->em->getRepository(Institucion::class)->find($id);

        if ($institucion) {
            if ($this->validateEntity($institucion)) {
                $this->em->remove($institucion);
                $this->em->flush();
            }
        }else{
            $this->statu   = false;
            $this->message = 'Operación fallida. Objeto no borrado.';
            $this->errors  = 'Object not found.';
        }

        return [
            'statu'       => $this->statu,
            'message'     => $this->message,
            'errors'      => $this->errors,
            'institucion' => $institucion,
        ];
    }

    // Lista a las instituciones
    public function list(): array
    {
        $instituciones = $this->em->getRepository(Institucion::class)->findAll();

        if (!$instituciones) {
            $this->statu   = false;
            $this->message = 'Operación fallida. Objetos no hallados.';
        }

        return [
            'statu'         => $this->statu,
            'message'       => $this->message,
            'instituciones' => $instituciones,
        ];
    }

    // Muestra una institución en específico
    public function show(int $id): array
    {
        $institucion = $this->em->getRepository(Institucion::class)->find($id);

        if (!$institucion) {
            $this->statu   = false;
            $this->message = 'Operación fallida. Objeto no hallado.';
        }

        return [
            'statu'       => $this->statu,
            'message'     => $this->message,
            'institucion' => $institucion,
        ];
    }

    // Valida la instancia de una entidad
    private function validateEntity(Institucion $institucion): bool
    {
        $validacion = $this->validator->validate($institucion);
        if ($validacion->count() > 0) {
            $this->statu   = false;
            $this->message = 'Operación fallida. Hay errores en la validación del objeto.';
            $this->errors  = $this->readErrors($validacion);
            return false;
        }
        return true;
    }

    // Carga los errores de validación de objetos
    private function readErrors ($validacion): string
    {
        $error = null;
        foreach ($validacion as $key => $value) {
            $error .= $value->getMessage();
        }
        return $error;
    }
}
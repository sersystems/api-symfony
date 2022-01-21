<?php

namespace App\Controller;

use App\Service\InstitucionService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/api/institucion", name="api_institucion")
 */
class InstitucionController extends AbstractController
{
    protected $institucionService;

    public function __construct(InstitucionService $institucionService)
    {
        $this->institucionService = $institucionService;
    }

    /**
     * Crea una nueva institución
     *
     * @Route("/create", name="api_institucion_create", methods={"POST"})
     */
    public function create(Request $request): Response
    {
        $data = $request->toArray();
        return $this->json($this->institucionService->create($data));
    }

    /**
     * Edita una institución en específico
     *
     * @Route("/edit/{id}", name="api_institucion_edit", requirements={"id"="\d+"}, methods={"PUT"})
     */
    public function edit(int $id, Request $request): Response
    {
        $data = $request->toArray();
        return $this->json($this->institucionService->edit($id, $data));
    }

    /**
     * Borra una institución en específico
     *
     * @Route("/delete/{id}", name="api_institucion_delete", requirements={"id"="\d+"}, methods={"DELETE"})
     */
    public function delete(int $id): Response
    {
        return $this->json($this->institucionService->delete($id));
    }

    /**
     * Lista a las instituciones
     *
     * @Route("/list", name="api_institucion_list", methods={"GET"})
     */
    public function list(): Response
    {
        return $this->json($this->institucionService->list());
    }

    /**
     * Muestra una institución en específico
     *
     * @Route("/show/{id}", name="api_institucion_show", requirements={"id"="\d+"}, methods={"GET"})
     */
    public function show(int $id): Response
    {
        return $this->json($this->institucionService->show($id));
    }
}

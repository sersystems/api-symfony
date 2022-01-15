<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(): Response
    {
        return new Response(
            '<html>
                <link rel="stylesheet" href="css/api.css">
                <body style="position: relative; top:30%; background-color: #b6b197;">
                <div style="text-align:center;">
                    <h1 style="font-size:600%; text-align:center;">API Rest</h1>
                    <h2 style="font-size:250%;">Bienvenido al proyecto</h2>
                    <h4>Desarrollado por Sergio Regalado Alessi</h4>
                </div>
                </body>
            </html>'
        );
    }
}

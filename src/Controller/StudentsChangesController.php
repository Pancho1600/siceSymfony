<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

final class StudentsChangesController extends MainController
{
    #[Route('/students/changes', name: 'app_students_changes')]
    public function index(): JsonResponse
    {
        return $this->obtenerProductos(1);   
    }
}

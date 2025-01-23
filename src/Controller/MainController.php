<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

use Doctrine\DBAL\Connection;
use Symfony\Component\HttpFoundation\Request;

class MainController extends AbstractController
{
    private Connection $connection;

    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    #[Route('/main', name: 'app_main')]
    public function index(): JsonResponse
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/MainController.php',
        ]);
    }

    
    public function obtenerProductos(int $id): JsonResponse
    {
        $producto = $this->connection->fetchAssociative('SELECT * FROM escuelaAlumno WHERE id_escuelaAlumno = ?', [$id]);
        if (!$producto) {
            return $this->json(['error' => 'Producto no encontrado'], 404);
        }

        return $this->json($producto);
    }
}

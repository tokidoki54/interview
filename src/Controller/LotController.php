<?php

declare(strict_types=1);

namespace App\Controller;

use App\Repository\LotRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

final class LotController extends AbstractController
{
    #[Route('/', name: 'lot_index', methods: ['GET'])]
    public function index(LotRepository $lotRepository): JsonResponse
    {
        return $this->json($lotRepository->findAll());
    }
}

<?php
namespace App\Controller;

use App\UseCase\Food\Create\FoodCreateCommand;
use App\UseCase\Food\FoodUseCase;
use App\UseCase\Food\Get\FoodGetCommand;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class FoodController extends AbstractController
{
    public function __construct(private readonly FoodUseCase $useCase)
    {
    }

    #[Route('/food', methods: 'GET')]
    public function index(): Response
    {
        return $this->render('food/index.html.twig');
    }

    #[Route('/food', methods: 'POST')]
    public function create(Request $request): JsonResponse
    {
        $command = new FoodCreateCommand(
            $request->get('name'),
            $request->get('unitWeight'),
            $request->get('calorie'),
            $request->get('protein'),
            $request->get('fat'),
            $request->get('carbohydrate')
        );
        $this->useCase->create($command);
        return $this->json(['message' => 'success'], 201);
    }

    #[Route('/food/{id}', methods: 'GET')]
    public function get(string $id): Response
    {
        $command = new FoodGetCommand($id);
        $result = $this->useCase->get($command);
        return $this->render('food/food.html.twig', ['food' => $result]);
    }
}
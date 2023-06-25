<?php

namespace App\Controller;

use App\Data\SearchData;
use App\Form\SearchForm;
use App\Repository\CarRepository;
use App\Repository\CarCategoryRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class CarsController extends AbstractController
{
    #[Route('/cars', name: 'app_cars')]
    public function index(CarRepository $carRepository, CarCategoryRepository $carCategoryRepository, Request $request): Response
    {
        $data = new SearchData();
        $data->page = $request->get('page', 1);
        $form = $this->createForm(SearchForm::class, $data);
        $form->handleRequest($request);
        // dd($data);
        $cars = $carRepository->findSearch($data);

        return $this->render('cars/index.html.twig', [
            'cars' => $cars,
            'form' => $form->createView()
        ]);
    }
}

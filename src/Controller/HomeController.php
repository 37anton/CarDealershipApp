<?php

namespace App\Controller;

use App\Services\CallApiOpenMeteo;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{


    #[Route('/', name: 'app_home')]
    public function index(CallApiOpenMeteo $callApiOpenMeteo): Response
    {
        // dd($callApiOpenMeteo->getMeteoData());
        return $this->render('home/index.html.twig', [
            'data' => $callApiOpenMeteo->getMeteoData()
        ]);
    }
}

<?php

namespace App\Controller;

use App\Repository\RestaurantHoursRepository;
use Doctrine\ORM\NonUniqueResultException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HoursRestaurantController extends AbstractController
{
    /**
     */
    #[Route('/hours', name: 'hours_restaurant')]
    public function index(RestaurantHoursRepository $restaurantHoursRepository): Response
    {

        $form_hours= $restaurantHoursRepository->findAllByDay();
        return $this->render('hours_restaurant/description.html.twig', [
            'form_hours' => $form_hours,
        ]);
    }
}

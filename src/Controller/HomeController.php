<?php

namespace App\Controller;


use App\Entity\Menu;
use App\Entity\NosProduits;
use App\Repository\NosProduitsRepository;
use App\Repository\RestaurantHoursRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/', name: 'app_home')]
    public function index(RestaurantHoursRepository $restaurantHoursRepository): Response
    {
        $bestMenu = $this->entityManager->getRepository(NosProduits::class)->findByBestMenu(1);
        $form_hours= $restaurantHoursRepository->findAllByDay();

        $menu = $this->entityManager->getRepository(Menu::class)->findAll();




        return $this->render('home/index.html.twig', [
            'bestMenu' => $bestMenu,
            'form_hours' => $form_hours,
            'menu' => $menu
        ]);
    }

    private function getDoctrine()
    {
    }
}

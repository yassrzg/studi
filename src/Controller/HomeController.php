<?php

namespace App\Controller;


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
        $formules = $this->entityManager->getRepository(NosProduits::class)->findAll();
        $produitsTries = [];
        foreach ($formules as $formule) {
            $categorie = $formule->getCategory();
            if (!isset($produitsTries[$categorie->getId()])) {
                $produitsTries[$categorie->getId()] = [
                    'nomCategorie' => $categorie->getName(),
                    'produits' => [],
                ];
            }
            $produitsTries[$categorie->getId()]['produits'][] = $formule;
        }



        return $this->render('home/index.html.twig', [
            'bestMenu' => $bestMenu,
            'form_hours' => $form_hours,
            'formule' => $produitsTries,
        ]);
    }
}

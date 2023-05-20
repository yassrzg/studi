<?php

namespace App\Controller;

use App\Entity\Footer;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DescriptionController extends AbstractController
{
    public function __construct(EntityManagerInterface $entityManager) {
        $this->entityManager = $entityManager;
    }
    #[Route('/a_propos', name: 'app_propos')]
    public function index(): Response
    {
        $description = $this->entityManager->getRepository(Footer::class)->findAll();


        return $this->render('footer/description.html.twig', [
            'description' => $description
        ]);
    }
}

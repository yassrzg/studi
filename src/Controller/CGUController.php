<?php

namespace App\Controller;

use App\Entity\Footer;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CGUController extends AbstractController
{
    public function __construct(EntityManagerInterface $entityManager) {
        $this->entityManager = $entityManager;
    }
    #[Route('/cgu', name: 'app_cgu')]
    public function index(): Response
    {
        $cgu = $this->entityManager->getRepository(Footer::class)->findAll();
        return $this->render('footer/cgu.html.twig',  [
            'cgu' => $cgu,

        ]);
    }
}

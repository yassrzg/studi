<?php

namespace App\Controller;



use App\Entity\NosProduits;
use App\Repository\CategorieRepository;
use App\Repository\NosProduitsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProduitController extends AbstractController
{

    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager) {
        $this->entityManager = $entityManager;
    }

    #[Route('/produits', name: 'app_produits')]
    public function index(NosProduitsRepository $produitRepo): Response
    {

        $produits = $produitRepo->findAll();
        $produitsTries = [];
        foreach ($produits as $produit) {
            $categorie = $produit->getCategory();
            if (!isset($produitsTries[$categorie->getId()])) {
                $produitsTries[$categorie->getId()] = [
                    'nomCategorie' => $categorie->getName(),
                    'produits' => [],
                ];
            }
            $produitsTries[$categorie->getId()]['produits'][] = $produit;
        }

        return $this->render('produit/index.html.twig', [
            'produitsTries' => $produitsTries,
        ]);
    }
}

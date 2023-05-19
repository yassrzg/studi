<?php

namespace App\Controller\Admin;

use App\Entity\Allergie;
use App\Entity\Caroussel;
use App\Entity\Categorie;
use App\Entity\Creneaux;
use App\Entity\Menu;
use App\Entity\NosProduits;
use App\Entity\Reservation;
use App\Entity\RestaurantHours;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        //return parent::index();

        // Option 1. You can make your dashboard redirect to some common page of your backend

        // $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        // return $this->redirect($adminUrlGenerator->setController(OneOfYourCrudController::class)->generateUrl());

        $routeBuilder = $this->container->get(AdminUrlGenerator::class);
        $url = $routeBuilder->setController(UserCrudController::class)->generateUrl();
            return $this->redirect($url);

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirect('...');
        // }

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
        // return $this->render('some/path/my-dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Quai Antique');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Acceuil', 'fa fa-home');
        yield MenuItem::linkToCrud('Clients', 'fas fa-user', User::class);
        yield MenuItem::linkToCrud('Catégories', 'fas fa-list', Categorie::class);
        yield MenuItem::linkToCrud('La Carte', 'fa-solid fa-utensils', NosProduits::class);
        yield MenuItem::linkToCrud('Formules', 'fas fa-star', Menu::class);
        yield MenuItem::linkToCrud('Réservations', 'fa fa-book', Reservation::class);
        yield MenuItem::linkToCrud("Liste d'allergies", 'fa fa-hand-dots', Allergie::class);
        yield MenuItem::linkToCrud('Place Disponible', 'fa fa-chair', Creneaux::class);
        yield MenuItem::linkToCrud('Données Restaurant', 'fa fa-database', RestaurantHours::class);
        yield MenuItem::linkToCrud('Caroussel', 'fa fa-desktop' ,Caroussel::class);

    }
}

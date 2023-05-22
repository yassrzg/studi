<?php

namespace App\DataFixtures;

use App\Entity\Allergie;
use App\Entity\Caroussel;
use App\Entity\Categorie;
use App\Entity\Footer;
use App\Entity\Menu;
use App\Entity\NosProduits;
use App\Entity\RestaurantHours;
use App\Entity\User;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    private UserPasswordHasherInterface $passwordEncoder;

    public function __construct(UserPasswordHasherInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        // Création d'allergie

        $allergie = new Allergie();
        $allergie->setName('chocolat');
        $manager->persist($allergie);

        // Création d'un utilisateur admin

        $admin = new User();
        $admin->setEmail('admin@ecf.com');
        $admin->setPassword($this->passwordEncoder->hashPassword($admin, 'admin_password'));
        $admin->setRoles(['ROLE_ADMIN']);
        $admin->setFirstname('studi');
        $admin->setLastname('ecf');

        $manager->persist($admin);

        // Création d'un utilisateur standard

        $user = new User();
        $user->setEmail('user@ecf.com');
        $user->setPassword($this->passwordEncoder->hashPassword($user, 'user_password'));
        $user->setFirstname('studi');
        $user->setLastname('User');
        $user->setAllergie($allergie);

        $manager->persist($user);

        // Création d'une Catégorie

        $categorie = new Categorie();
        $categorie->setName('menu');

        $manager->persist($categorie);

        // Création d'une formule

        $formule = new Menu();
        $formule->setTitre('formule 1');
        $manager->persist($formule);



        // Création d'un produit

        $produit = new NosProduits();
        $produit->setName('Nom du produit');
        $produit->setSubtitle('Sous-titre du produit');
        $produit->setDescription('Description du produit');
        $produit->setPrice(9.99);
        $produit->setCategory($categorie);
        $img = realpath('public/imgTest/imgTest.jpeg');
        $produit->setIllustration($img);
        $produit->setTitreIllustration('img sandwich');
        $produit->setTitreIllustration('Titre img');
        $produit->setBestMenu(true);
        $produit->setMenu($formule);

        $manager->persist($produit);

        // création de créneaux horaire

        $hours = new RestaurantHours();
        // attention , à renseigner en anglais
        $hours->setJours('Monday');
        $openHours = DateTime::createFromFormat('H:i', '11:00');
        $hours->setOpenHours($openHours);

        $closeHours = DateTime::createFromFormat('H:i', '14:00');
        $hours->setCloseHours($closeHours);

        $openHoursSoir = DateTime::createFromFormat('H:i', '19:00');
        $hours->setOpenHoursSoir($openHoursSoir);

        $closeHoursSoir = DateTime::createFromFormat('H:i', '23:00');
        $hours->setCloseHoursSoir($closeHoursSoir);

        $hours->setNombreCouvertMax('20');
        $hours->setIntervalleHoraire('30');
        $manager->persist($hours);

        // création du caroussel

        $caroussel = new Caroussel();
        $caroussel->setBtnTitle('réserver');
        $caroussel->setBtnUrl('/reservations');
        $imgCaroussel = realpath('public/Uploads/restaurant2.jpg');
        $caroussel->setIllustration($imgCaroussel);
        $manager->persist($caroussel);

        // création du footer

        $footer = new Footer();
        $footer->setDescription('hello à propos');
        $imgDescription = realpath('public/Uploads/restaurant4.jpg');
        $footer->setDescriptionImage($imgDescription);
        $footer->setCgu('hello cgu');

        $manager->persist($footer);


        $manager->flush();
    }
}

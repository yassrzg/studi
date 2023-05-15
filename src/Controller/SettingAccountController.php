<?php

namespace App\Controller;

use App\Classe\Mail;
use App\Form\SettingAccountType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

class SettingAccountController extends AbstractController
{
    public function __construct(EntityManagerInterface $entityManager) {
        $this->entityManager = $entityManager;

    }

    #[Route('/account/setting', name: 'app_account_setting')]
    public function index(Request $request, UserPasswordHasherInterface $hashPassword): Response
    {
        $notification = null;

        $user = $this->getUser();
        $form = $this->createForm(SettingAccountType::class, $user);

        $form -> handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $user = $form->getData();
            $allergieData = $form->get('alergieType')->getData();
            $allergiesArray = array();
            foreach ($allergieData as $allergie) {
                $allergiesArray[] = $allergie->getName();
            }
            $password = $hashPassword->hashPassword($user,$user->getPassword());
            $allergiesString = implode(',', $allergiesArray); // convert array to string
            $user->setAllergie($allergiesString);
            $user->setPassword($password);
            $this->entityManager->persist($user);
            $this->entityManager->flush();

            $email = new Mail();
            $subject = 'Inscription Réussi';
            $content='Votre Compte a été crée avec succès! <br/><br/> Rendez-vous sur notre site pour réserver une table !';
            $name_content = $user->getFirstname();
            $email->send($user->getEmail(), $user->getFirstname(), $subject, $content, $name_content );

            $notification= 'Mise à jour réussi ! Veuillez recharger la page';

        }
        return $this->render('account/setting.html.twig', [
            'form' => $form->createView(),
            'notification' => $notification
        ]);
    }
}

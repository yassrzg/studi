<?php

namespace App\Controller;

use App\Classe\Mail;
use App\Entity\ResetPassword;
use App\Entity\User;
use App\Form\ResetPasswordType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

class ResetPassWordController extends AbstractController
{
    public function __construct(EntityManagerInterface $entityManager) {
        $this->entityManager = $entityManager;

    }
    #[Route('/reset-password', name: 'app_reset_pass_word')]
    public function index(Request $request): Response
    {

        $notification = null;
        $notificationEchec =null;
        if($this->getUser()) {
            return $this->redirectToRoute('app_home');
        }
        if($request->get('email')) {
            $user = $this->entityManager->getRepository(User::class)->findOneByEmail($request->get('email'));
            if($user) {
                // enregistrer la demande de reset password
                $reset_password = new ResetPassword();
                $reset_password->setUser($user);
                $reset_password->setToken(uniqid());
                $reset_password->setCreatedAt(new \DateTime());
                $this->entityManager->persist($reset_password);
                $this->entityManager->flush();

                // Envoyer un mail de mise à jour mdp
                $url = $this->generateUrl('app_up_pass_word',
                        ['token'=> $reset_password->getToken()]);
                $email = new Mail();
                $subject = ' Réinitialiser votre mot de passe';
                $name_content = $user->getFirstname();
                $content = "Pour réinitialiser votre mot de passe. <br/><br/> Veuillez cliquer sur le lien suivant : <br/><br/><br/> <a href='".$url."'>Mettre à jour son mot de passe</a>";

                $email->send($user->getEmail(), $user->getFirstname(). ' '.$user->getLastname(), $subject, $content, $name_content);

                $notification = ' Un email vous a été envoyé';
            }else {
                $notificationEchec ='Aucun compte associé à cet email.';
            }
        }
        return $this->render('reset_pass_word/index.html.twig', [
            'notification' => $notification,
            'notificationEchec' => $notificationEchec
        ]);
    }

    #[Route('/modif-password/{token}', name: 'app_up_pass_word')]
    public function update(Request $request, UserPasswordHasherInterface $hashPassword, $token): Response
    {
        $reset_password = $this->entityManager->getRepository(ResetPassword::class)->findOneByToken($token);


        if(!$reset_password) {
            return $this->redirectToRoute('app_reset_pass_word');
        }
//        $now = new \DateTime();
//        if($now <  $reset_password->getCreatedAt()->modify('+ 3 hour')) {
//            $this->addFlash('notice', 'Votre demande de réinitilisation a expiré');
//            return $this->redirectToRoute('app_reset_pass_word');
//        }
        $form = $this->createForm(ResetPasswordType::class);
        $form-> handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            // récup le pwd du form
            $new_pwd = $form->get('password')->getData();
            // hash password
            $password = $hashPassword->hashPassword($reset_password->getUser(),$new_pwd);
            $reset_password->getUser()->setPassword($password);
            // j'envoie la data
            $this->entityManager->flush();
            // NOTIFICATION MDP MIS À JOUR
            // MAIL A ENVOYE AUSSI
            return $this->redirectToRoute('app_login');
        }
        return $this->render('reset_pass_word/update.html.twig', [
            'form'=> $form->createView()
        ]);



    }
}

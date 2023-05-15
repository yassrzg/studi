<?php

namespace App\Controller;

use AllowDynamicProperties;
use App\Classe\Mail;
use App\Entity\Creneaux;
use App\Entity\Reservation;
use App\Form\ReservationType;
use App\Repository\CreneauxRepository;
use App\Repository\RestaurantHoursRepository;
use DateInterval;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use DateTimeImmutable;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;


#[AllowDynamicProperties] class ReservationController extends AbstractController
{


    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;

    }

    #[Route('/reservations/{dateReservation<\d{4}-\d{2}-\d{2}>?}', name: 'app_reservation')]
    public function index(EntityManagerInterface $entityManager, Request $request, RestaurantHoursRepository $restaurantHoursRepository, CreneauxRepository $creneauxRepository , UrlGeneratorInterface $urlGenerator,$dateReservation): Response
    {
        $notification = null;
        $notificationEchec = null;


        $reservation = new Reservation();
        $form = $this->createForm(ReservationType::class, $reservation);

        $reservationDate = new \DateTimeImmutable();




            $reservationDate = $dateReservation;

            $form->add('date', DateType::class, [
                'widget' => 'single_text',
                'data' => new DateTime($reservationDate),

            ]);


            $user = $this->getUser();
            if($user) {
                $form->add('allergie', TextType::class, [
                    'data' =>  $user->getAllergie(),
                    'mapped' => false,
                    'disabled' => true,
                ]);

            }








        $reservationDate = new \DateTimeImmutable($dateReservation ?? 'now');
        $reservationDay = $reservationDate->format('l');

        // restaurantHours à renommer dayData
        $restaurantHours = $restaurantHoursRepository->findOneBy(['jours' => $reservationDay]);




        $creneaux = [];
        if ($restaurantHours->getOpenHours()) {
            $creneaux[$restaurantHours->getOpenHours()->format('H:i')] = $restaurantHours->getCloseHours()->format('H:i');
        }
        if ($restaurantHours->getOpenHoursSoir()) {
            $creneaux[$restaurantHours->getOpenHoursSoir()->format('H:i')] = $restaurantHours->getCloseHoursSoir()->format('H:i');
        }



        $reservationInterval = $restaurantHours->getIntervalleHoraire();


        $interval = new DateInterval('PT' . $reservationInterval . 'M');

        $times = array();
        if ($creneaux) {

            foreach ($creneaux as $heureOuverture => $heureFermeture) {
                $startTime = DateTimeImmutable::createFromFormat('H:i', $heureOuverture);
                $endTime = DateTimeImmutable::createFromFormat('H:i', $heureFermeture);
                while ($startTime <= $endTime) {
                    $times[] = DateTime::createFromFormat('H:i', $startTime->format('H:i'));
                    $startTime = $startTime->add($interval);
                }
            }
        }



        if ($times) {
            $form->add('Heure', ChoiceType::class, [
                'choices' => $times,
                'expanded' => true,
                'label' => 'Choisissez votre créneaux',
                'choice_label' => function ($value) {
                    return $value->format('H:i');
                }
            ])
            ->add( 'submit', SubmitType::class, [
                'label' => "Réservez"
            ]);

        }


      //  $nombreCouvertMax = $restaurantHours -> getNombreCouvertMax();

       // $user = $this->getUser();

            $form->handleRequest($request);
            // je vérifie que le form est valid et submit
            if ($form->isSubmitted() && $form->isValid()) {
                // je récupère le créneau de la reservation
                $heureReservee = $form->get('Heure')->getData();
                // je récup-re la date et je fusionne date + heure pour obtenir un type dateTime
                $creneauReserve = new DateTimeImmutable($reservationDate->format('Y-m-d') . $heureReservee->format('H:i'));
                // je cherche le créneau si il existe selon la date et l'heure
                $creneauExistant = $creneauxRepository->findOneBy(['Date' => $creneauReserve]);
                // je récupère le nbre de couvert désirer par le client
                $nombreCouvertDesire = $form->get('couverts')->getData();

                // $nombreCouvertRestant = $creneauExistant->getNombreCouvertRestant();


                // si le créneau existe et le nombre de couvert demande est inf ou égal au nbre de couvert restant.
                if ($creneauExistant) {
                    // nombreCouvertDisponible = nombreCouvertRestant après la dernière réservation à la date et l'heure précise -
                    // nombreCouvertDesirer par le client
                    // je récupere le nombre de couvert Restant dans le même créneau
                    $nombreCouvertRestant = $creneauExistant->getNombreCouvertRestant();
                    // je récupère le nombre de couvert désirer par le client
                    $nombreCouvertDesire = $form->get('couverts')->getData();
                    // je soustrait pour obtenir le nombre de nouveau couvert dispo après reservation
                    $nouveauNombreCouvertDisponible = $nombreCouvertRestant - $nombreCouvertDesire;

                    // je met une condition que pour continué la réservation il faut que le nbre de couvert dispo
                    // soit sup ou égal à 0
                    if ($nouveauNombreCouvertDisponible >= 0) {
                        // dans le créneau existant j'actualise le nouveau nombre de couvert dispo après réservation
                        $creneauExistant->setNombreCouvertRestant($nouveauNombreCouvertDisponible);
                        // si créneau déja pris par quelqu'un je récup la data de user + allergie
                            if($user) {
                                $reservation->getUsers($user);
                                $allergiesArray = explode(',', $user->getAllergie());
                                $reservation->setAllergie($allergiesArray);

                            }
                            // si créneau déja pris par quelqu'un mais je ne suis pas connecté je récup la data selectionner
                            else {
                                // je récupère les informations Allergie si le client en à cocher
                                $allergieData = $form->get('allergie')->getData();
                                $allergiesArray = array();
                                // je les transmet sous forme de tableau en chaine de caractère
                                foreach ($allergieData as $allergie) {
                                    $allergiesArray[] = $allergie->getName();
                                }
                                // je récupère et envoie la data de Allergie
                                $reservation->setAllergie($allergiesArray);
                            }
                            // je transmet toute la data dans mes tables:
                            // ma table créneaux va seulement me servir à vérifié le nombre de couvert dispo pour un créneau horaire précis
                            $entityManager->persist($creneauExistant);
                            // j'enregistre toute ma data pour l'admin
                            $entityManager->persist($reservation);
                            $entityManager->flush();
                            $email = new Mail();
                            $subject = 'Réservation confirmé!';
                            $date = $reservation->getDate();
                            $time = $reservation->getHeure();
                            $covers = $reservation->getCouverts();
                                if($user){
                                    $allergiesStr = $user->getAllergie();
                                } else {
                                    $allergiesMail = $reservation->getAllergie();
                                    $allergiesMailStr = '';
                                    foreach ($allergiesMail as $allergie) {
                                        $allergiesMailStr .= $allergie. ', ';
                                    }
                                    $allergiesStr = rtrim($allergiesMailStr, ', ');
                                }
                            $content = 'Récapitulatif de la réservation <br/><br/><br/><br/> Date : ' . $date->format('Y-m-d') . '<br/><br/> Heure : ' . $time->format('H:i') . ' <br/><br/> Pour un nombre de ' . $covers.' personnes' . '<br/> <br/> Vous avez déclaré ces allergies : <br/><br/>' . $allergiesStr. '<br/><br/> Veuillez appeler le Restaurant pour annuler votre réservation';

                            $name_content = $reservation->getName();
                            $email->send($reservation->getEmail(), $reservation->getName(), $subject, $content, $name_content );
                            $notification= 'Réservation Réussi ! Nous vous avons envoyé un mail !';
                        } else {

                        $notificationEchec= 'Créneaux Horaire Indisponible ! Essayez un nouveau créneau !';
                    }

                }
                // sinon crée une nouvelle reservation pour un nouveau créneau jamais pris par personne.
                else {
                    // je crée un nouvel objet créneaux
                    $creneau = new Creneaux();
                    // je récup le nbre de couvert maximum pour ce créneau vu qu'il n'y a
                    // aucune autre résa de faite sur ce créneaux
                    $couvertDisponible = $restaurantHours->getNombreCouvertMax();
                    // dans mon obj créneau je récup la date
                    $creneau->setDate($creneauReserve)->setNombreCouvert($nombreCouvertDesire);

                    // je récup le nombre de couvert restant après la réservation
                    $creneau->setNombreCouvertRestant($couvertDisponible - $nombreCouvertDesire);
                    // si l'utilisateur est connecté et le créneau n'a jamais été reserver par personne
                        if($user) {
                            // je récupère la data de user + les allergies qui lui son associer
                            $reservation->getUsers();
                            $allergieData =  $user->getAllergie();


                            $allergiesDataArray = explode(',', $allergieData);
                            $allergiesArray = array();
                            foreach ($allergiesDataArray as $allergie) {
                                $allergiesArray[] = $allergie;
                            }

                            $reservation->setAllergie($allergiesArray);


                        }
                        // si pas connecter je récup les data allergie selectionner
                        else{
                            // je récup pareil les data allergie
                            $allergieData = $form->get('allergie')->getData();
                            $allergiesArray = array();
                            foreach ($allergieData as $allergie) {
                                $allergiesArray[] = $allergie->getName();
                            }

                        // je transmet toute la data
                        $reservation->setAllergie($allergiesArray);

                    }

                    $entityManager->persist($creneau);
                    $entityManager->persist($reservation);
                    $entityManager->flush();
                    $email = new Mail();
                    $subject = 'Réservation confirmé!';
                    $date = $reservation->getDate();
                    $time = $reservation->getHeure();
                    $covers = $reservation->getCouverts();
                    if($user){
                        $allergiesStr = $user->getAllergie();
                    } else {
                        $allergiesMail = $reservation->getAllergie();
                        $allergiesMailStr = '';
                        foreach ($allergiesMail as $allergie) {
                            // modif ici getname()
                            $allergiesMailStr .= $allergie. ', ';
                        }
                        $allergiesStr = rtrim($allergiesMailStr, ', ');
                    }
                    $content = 'Récapitulatif de la réservation <br/><br/><br/><br/> Date : ' . $date->format('Y-m-d') . '<br/><br/> Heure : ' . $time->format('H:i') . ' <br/><br/> Pour un nombre de ' . $covers.' personnes' . '<br/> <br/> Vous avez déclaré ces allergies : <br/><br/>' . $allergiesStr. '<br/><br/> Veuillez appeler le Restaurant pour annuler votre réservation';

                    $name_content = $reservation->getName();
                    $email->send($reservation->getEmail(), $reservation->getName(), $subject, $content, $name_content );
                    $notification= 'Réservation Réussi ! Nous vous avons envoyé un mail !';

                }

            }


        return $this->render('reservation/index.html.twig', [
            'form' => $form->createView(),
            'times' => $times,
            'notification' => $notification,
            'notificationEchec' => $notificationEchec,

        ]);
    }


}


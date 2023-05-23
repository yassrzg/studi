<?php

namespace App\Form;

use App\Entity\Allergie;
use App\Entity\Reservation;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\GreaterThanOrEqual;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Regex;

class ReservationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name',TextType::class, [
                'label' => 'Votre prénom',
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez entrer votre prénom.'
                    ]),
                    new Length([
                        'min' => 2,
                        'max' => 25,
                        'minMessage' => 'Votre prénom doit contenir au moins {{ limit }} caractères.',
                        'maxMessage' => 'Votre prénom ne peut pas dépasser {{ limit }} caractères.'
                    ]),
                    new Regex([
                        'pattern' => '/^[a-zA-Z]+$/',
                        'message' => 'Votre prénom ne peut contenir que des lettres.'
                    ])
                ]
    ])
            ->add('lastname', TextType::class, [
                'label' => 'Votre nom',
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez entrer votre prénom.'
                    ]),
                    new Length([
                        'min' => 2,
                        'max' => 25,
                        'minMessage' => 'Votre nom doit contenir au moins {{ limit }} caractères.',
                        'maxMessage' => 'Votre nom ne peut pas dépasser {{ limit }} caractères.'
                    ]),
                    new Regex([
                        'pattern' => '/^[a-zA-Z]+$/',
                        'message' => 'Votre prénom ne peut contenir que des lettres.'
                    ])
                ]
            ])
            ->add('email', EmailType::class, [
                'label' => 'Votre email',
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez entrer votre email.'
                    ]),
                    new Email([
                        'message' => 'Veuillez entrer une adresse email valide.'
                    ])
                ]
            ])
            ->add('date', DateType::class, [
                'widget' => 'single_text',
                'data' => new \DateTimeImmutable(),
            ])
            ->add('couverts', ChoiceType::class, [
                'choices' => [
                    '1 couvert' => 1,
                    '2 couverts' => 2,
                    '3 couverts' => 3,
                    '4 couverts' => 4,
                    '5 couverts' => 5,
                    '6 couverts' => 6,
                    '7 couverts' => 7,
                    '8 couverts' => 8,
                    '9 couverts' => 9,
                    '10 couverts' => 10,
                ],
                'required' => true,
                'label' => 'Nombre de couverts',
                'attr' => [
                    'class' => 'form-control',
                ]
            ])


            ->add('allergie', EntityType::class, [
                'class' => Allergie::class,
                'required' => false,
                'multiple' => true,
                'expanded' => true,
                'label' => 'Voici les éventuelles allergies liées à notre restaurant',
                'attr' => [
                    'class' => 'form-check',
                ]
            ])
            ->add('Note', TextareaType::class, [
                'label' => 'Avez-vous un message à nous transmettre ?',
                'required' => false,
            ])

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Reservation::class,
        ]);
    }
}

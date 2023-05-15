<?php

namespace App\Form;

use App\Entity\Allergie;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SettingAccountType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class, [
                'disabled' => true,
                'label' => 'Email'
            ])
            ->add('firstname', TextType::class, [
                'label' => 'Name'
            ])
            ->add('lastname', TextType::class, [
                'label' => 'Surname'
            ])

            ->add('password', RepeatedType::class, [
                'type' => PasswordType::class,
                'invalid_message' => 'Mot de passe non identique',
                'label' => 'votre mot de passe',
                'required' => true,
                'first_options' => ['label' => 'Password'],
                'second_options' => ['label' => 'Confirm Password']
            ])
            ->add('Allergie', TextType::class, [
                'disabled' => true
            ])
            ->add('alergieType', EntityType::class, [
                'class' => Allergie::class,
                'label' => 'Selectionner vos allergies',
                'required' => false,
                'multiple' => true,
                'expanded' => true,

                'attr' => [
                    'class' => 'form-check',
                ]
            ])
            ->add( 'submit', SubmitType::class, [
                'label' => "Mettre à jour"
            ])

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}

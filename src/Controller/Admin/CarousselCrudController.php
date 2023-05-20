<?php

namespace App\Controller\Admin;

use App\Entity\Caroussel;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class CarousselCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Caroussel::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('btnTitle', 'Titre de notre bouton'),
            TextField::new('btnUrl', 'Url de notre bouton'),
            ImageField::new('illustration')->setBasePath('uploads/')
                ->setUploadDir('public/Uploads')
                ->setUploadedFileNamePattern('[randomhash]. [extension]')
                ->setRequired(false),
        ];
    }

}

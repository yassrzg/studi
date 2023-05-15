<?php

namespace App\Controller\Admin;

use App\Entity\NosProduits;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class NosProduitsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return NosProduits::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [

            TextField::new('name')
            ->setLabel('Nom'),
            SlugField::new('slug')
            ->setTargetFieldName('name'),
            ImageField::new('illustration')->setBasePath('uploads/')
            ->setUploadDir('public/Uploads')
            ->setUploadedFileNamePattern('[randomhash]. [extension]')
            ->setRequired(false),
            TextField::new('titreIllustration'),
            TextField::new('subtitle'),
            TextareaField::new('description'),
            MoneyField::new('price')->setCurrency('EUR'),
            AssociationField::new('category'),
            BooleanField::new('bestMenu')
        ];
    }

}

<?php

namespace App\Controller\Admin;

use App\Entity\Footer;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;

class FooterCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Footer::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextareaField::new('Description'),
            ImageField::new('descriptionImage')->setBasePath('uploads/')
                ->setUploadDir('public/Uploads')
                ->setUploadedFileNamePattern('[randomhash]. [extension]')
                ->setRequired(false),

            TextareaField::new('cgu'),
            ImageField::new('cguImage')->setBasePath('uploads/')
                ->setUploadDir('public/Uploads')
                ->setUploadedFileNamePattern('[randomhash]. [extension]')
                ->setRequired(false),
        ];
    }

}

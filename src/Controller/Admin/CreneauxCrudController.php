<?php

namespace App\Controller\Admin;

use App\Entity\Creneaux;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;

class CreneauxCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Creneaux::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            DateTimeField::new('Date'),
            NumberField::new('NombreCouvertRestant'),
        ];
    }

}

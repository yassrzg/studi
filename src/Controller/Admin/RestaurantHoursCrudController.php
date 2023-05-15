<?php

namespace App\Controller\Admin;

use App\Entity\RestaurantHours;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TimeField;

class RestaurantHoursCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return RestaurantHours::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('jours'),
            TimeField::new('openHours'),
            TimeField::new('closeHours'),
            TimeField::new('open_hours_soir'),
            TimeField::new('close_hours_soir'),
            NumberField::new('IntervalleHoraire'),
        ];
    }

}

<?php

namespace App\Controller\Admin;

use App\Entity\Budget;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class BudgetCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Budget::class;
    }

    public function configureFields(string $pageName): iterable
    {
        yield IdField::new('id')->hideOnForm();
        yield TextField::new('name');
        yield AssociationField::new('owner')->autocomplete();
        yield DateTimeField::new("createdAt")->hideOnForm();
        yield DateTimeField::new("updatedAt")->hideOnForm();
    }
}

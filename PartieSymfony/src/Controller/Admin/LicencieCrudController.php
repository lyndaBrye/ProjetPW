<?php

namespace App\Controller\Admin;

use App\Entity\Licencie;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Filter\EntityFilter;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;

class LicencieCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Licencie::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('numero_licencie'),
            TextField::new('nom'),
            TextField::new('prenom'),
            AssociationField::new('contact_id', 'Contact')
                ->hideOnForm()
                ->formatValue(function ($value, $entity) {
                    if ($value) {
                        return $value->getNom();
                    }
                    return null;
                }),

        ];
    }

    public function configureFilters(Filters $filters): Filters
    {
        return $filters
            ->add(EntityFilter::new('categorie_id', 'Categorie'),
    );

    }


}

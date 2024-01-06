<?php

namespace App\Controller\Admin;

use App\Entity\Educateur;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class EducateurCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Educateur::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('email'),
            AssociationField::new('licencie_id', 'Numero de licence')
                ->hideOnForm()
                ->formatValue(function ($value, $entity) {
                    if ($value) {
                        return $value->getNumeroLicencie();
                    }
                    return null;
                }),
            AssociationField::new('licencie_id', 'Licencie')
                ->hideOnForm()
                ->formatValue(function ($value, $entity) {
                    if ($value) {
                        return $value->getNom().' '.$value->getPrenom();
                    }
                    return null;
                }),

            // TextEditorField::new('description'),
        ];
    }

}

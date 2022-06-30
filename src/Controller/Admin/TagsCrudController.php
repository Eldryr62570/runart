<?php

namespace App\Controller\Admin;

use App\Entity\Tags;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class TagsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Tags::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('nom_tag'),
            AssociationField::new('oeuvre')->hideOnForm(),
        ];
    }
    public function persistEntity(EntityManagerInterface $entityManager, $entityInstance): void
    {
        if(!$entityInstance instanceof Tags)return;
        parent::persistEntity($entityManager,$entityInstance);
    }
}

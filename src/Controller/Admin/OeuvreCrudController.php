<?php

namespace App\Controller\Admin;

use App\Entity\Oeuvre;
use App\Entity\Tags;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class OeuvreCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Oeuvre::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            ImageField::new('photo_oeuvre')->setLabel("Photo oeuvre")
            ->setUploadDir('public/build/uploads')
            ->setUploadedFileNamePattern('/uploads/[contenthash].[extension]'),
            TextField::new('nom_oeuvre'),
            NumberField::new('prix'),
            TextField::new('description_oeuvre'),
            AssociationField::new('categorie'),
            AssociationField::new('tags')
        ];
    }
    public function persistEntity(EntityManagerInterface $entityManager, $entityInstance): void
    {
        if(!$entityInstance instanceof Oeuvre)return;
        parent::persistEntity($entityManager,$entityInstance);
    }
   
    
}

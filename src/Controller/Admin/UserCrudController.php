<?php

namespace App\Controller\Admin;

use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class UserCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return User::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('email')->setLabel("Adresse E-mail"),
            TextField::new('firstname')->setLabel("Prénom"),
            TextField::new('name')->setLabel("Nom"),
            TextareaField::new('biographie')->setLabel("Biographie"),
            ImageField::new('photo_user')->setLabel("Photo de profl")
            ->setUploadDir('public/build/uploads')
            ->setUploadedFileNamePattern('/uploads/[contenthash].[extension]'),
            AssociationField::new('oeuvres'),
        ];
    }
    public function configureActions(Actions $actions): Actions
    {
        return $actions->setPermission(Action::NEW, 'none');
    }
}

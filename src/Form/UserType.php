<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstname', TextType::class, [
                'attr' => [
                    'class' => 'flex flex-col justify-start items-center w-full text-black border-0 rounded'
                ],
                'label' => 'Prénom'
            ])
            ->add('name', TextType::class, [
                'attr' => [
                    'class' => 'flex flex-col justify-start items-center w-full text-black border-0 rounded'
                ],
                'label' => 'Nom'
            ])
            ->add('email', EmailType::class, [
                'attr' => [
                    'class' => 'flex flex-col justify-start items-center w-full text-black border-0 rounded'
                ],
                'label' => 'Email'
            ])
            ->add('biographie', TextareaType::class, [
                'attr' => [
                    'class' => 'flex flex-col justify-start items-center w-full text-black border-0 rounded'
                ],
                'label' => 'Biographie'
            ])
            ->add('submit', SubmitType::class, [
                'attr' => [
                    'class' => 'bg-stone-700 text-white submit mt-2'
                ],
                'label' => 'Envoyer'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}

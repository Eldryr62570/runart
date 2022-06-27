<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Name', TextType::class, [
                'attr' => [
                    'class' => 'flex flex-col justify-start items-center w-full text-black border-0 rounded'
                ],
                'label' => 'Nom'
            ])
            ->add('Firstname', TextType::class, [
                'attr' => [
                    'class' => 'flex flex-col justify-start items-center w-full text-black border-0 rounded'
                ],
                'label' => 'Prénom'
            ])
            ->add('Email', EmailType::class,[
                'attr' => [
                    'class' => 'flex flex-col justify-start items-center w-full text-black border-0 rounded'
                ],
                'label' => 'Email'
            ])
            ->add('Telephone', TextType::class, [
                'attr' => [
                    'class' => 'flex flex-col justify-start items-center w-full text-black border-0 rounded'
                ],
                'label' => 'Téléphone'
            ])
            ->add('Subject', TextType::class, [
                'attr' => [
                    'class' => 'flex flex-col justify-start items-center w-full text-black border-0 rounded'
                ],
                'label' => 'Sujet'
            ])
            ->add('Message', TextareaType::class, [
                'attr' => [
                    'class' => 'flex flex-col justify-start items-center w-full text-black border-0 rounded'
                ],
                'label' => 'Message'
            ])
            ->add('submit', SubmitType::class, [
                'attr' => [
                    'class' => 'bg-orange-100 text-black submit'
                ],
                'label' => 'Envoyer'
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}
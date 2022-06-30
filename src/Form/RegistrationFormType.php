<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class, [
                'attr' => [
                    'class' => 'flex flex-col justify-start items-center w-full text-black border-0 rounded'
                ],
                'label' => 'Email'
            ])
            ->add('plainPassword', RepeatedType::class, [
                'type' => PasswordType::class,
                'mapped' => false,
                'first_options' => [
                    'attr' => [
                        'autocomplete' => 'new-password',
                        'class' => 'flex flex-col justify-start items-center w-full text-black border-0 rounded'
                    ],
                    'label' => "Mot de passe",
                ],
                'second_options' => [
                    'attr' => [
                        'autocomplete' => 'new-password',
                        'class' => 'flex flex-col justify-start items-center w-full text-black border-0 rounded'
                    ],
                    'label' => "Confirmation du mot de passe"
                ],
                'invalid_message' => "Les mots de passe ne correspondent pas",
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter a password',
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Your password should be at least {{ limit }} characters',
                        // max length allowed by Symfony for security reasons
                        'max' => 4096,
                    ]),
                ],
                'label' => 'Mot de passe'
            ])
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
            ->add('biographie', TextareaType::class, [
                'attr' => [
                    'class' => 'flex flex-col justify-start items-center w-full text-black border-0 rounded'
                ],
                'label' => 'Biographie'
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}

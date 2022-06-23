<?php

namespace App\DataFixtures;

use App\Entity\Categorie;
use App\Entity\Oeuvre;
use App\Entity\Tags;
use Faker\Factory;
use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Laminas\Code\Generator\DocBlock\Tag;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    public function __construct(private UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }
    public function load(ObjectManager $manager): void
    {
        $users = [];
        $faker = Factory::create('fr_FR');
        for ($i = 0; $i < 20; $i++) {
            $user = new User();
            $user->setRoles(["ROLE_ADMIN"])
            ->setCreatedAt($faker->dateTime())
            ->setBiographie($faker->paragraph(8,true))
            ->setEmail($faker->safeEmail())
            ->setFirstname($faker->firstName())
            ->setName($faker->name())
            ->setIsVerified(1)
            ->setPhotoUser("build/uploads/placeholder.jpg");
               //Tout les users générés auront comme mdp "1234"
               $plaintextPassword = "1234";
               $hashedPassword = $this->passwordHasher->hashPassword(
                   $user,
                   $plaintextPassword
               );
            $user->setPassword($hashedPassword);
            $manager->persist($user);
            $manager->flush();
            
            $users[] = $user;
        }
        for ($i=0; $i < 20 ; $i++) { 
            $categorie = new Categorie();
            $categorie->setImageCategorie("build/uploads/placeholder2.jpg")
            ->setNomCategorie($faker->sentence(3));
            $manager->persist($categorie);
            $manager->flush();
            
            $tag =new Tags();
            $tag->setNomTag($faker->word(1));
            $manager->persist($tag);
            $manager->flush();

            $oeuvre = new Oeuvre();
            $oeuvre->setDescriptionOeuvre($faker->sentence(8))
            ->setNomOeuvre($faker->word(1))
            ->setPhotoOeuvre("build/uploads/placeholder1.jpg")
            ->setPrix($faker->numberBetween(5000 , 1200000))
            ->addUser($users[array_rand($users)])
            ->addUser($users[array_rand($users)])
            ->addUser($users[array_rand($users)])
            ->setCategorie($categorie)
            ->addTag($tag);
            $manager->persist($oeuvre);
            $manager->flush();
        }
    }
}

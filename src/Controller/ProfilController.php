<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Oeuvre;
use App\Form\UserType;
use App\Form\OeuvreType;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Entity;

class ProfilController extends AbstractController 
{
    #[Route('/profil/{user_id}', name: 'profil')]
    #[Entity('users', options: ['id' => 'user_id'])]
    public function index(User $users, Request $request, EntityManagerInterface $manager): Response
    {
        $form = $this->createForm(UserType::class, $users);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $users = $form->getData();
            $manager->persist($users);
            $manager->flush();
            $this->addFlash(
                'success',
                'Votre profil a bien été modifié'
            );
        }
        
        // $FormOeuvre = $this->createForm(OeuvreType::class, $oeuvres);
        // $FormOeuvre->handleRequest($request);

        // if ($FormOeuvre->isSubmitted() && $FormOeuvre->isValid()) {
        //     $oeuvres = $FormOeuvre->getData();

        //     $manager->persist($oeuvres);
        //     $manager->flush();

        //     $this->addFlash(
        //         'suppr',
        //         'Votre oeuvre a bien été modifié'
        //     );
        // }

        return $this->render('home/profil.html.twig', [
            'form' => $form->createView(),
            //'FormOeuvre' => $FormOeuvre->createView()
        ]);
    }
}
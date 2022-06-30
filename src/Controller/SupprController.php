<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Oeuvre;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SupprController extends AbstractController
{

    #[Route('/suppr_oeuvre/{id}', name: 'suppr_oeuvre', methods: ['GET'])]
    public function SupprOeuvre(EntityManagerInterface $manager, Oeuvre $oeuvre,): Response
    {
        if(!$oeuvre) {
            $this->addFlash(
                'suppr_echec',
                'Votre oeuvre n\'a pas été trouvée.'
            );

            return $this->redirectToRoute('index');
        }
        
        $manager->remove($oeuvre);
        $manager->flush();

        $this->addFlash(
            'suppr',
            'Votre oeuvre a bien été supprimée.'
        );

        return $this->redirectToRoute('profil', ['id' => $this->getUser()->getId()]);
    }

    #[Route('/suppr_user/{id}', name: 'suppr_user', methods: ['GET'])]
    public function SupprUser(EntityManagerInterface $manager, User $user): Response
    {
        if(!$user) {
            $this->addFlash(
                'suppr_echec',
                'Votre compte n\'a pas été trouvé.'
            );

            return $this->redirectToRoute('index');
        }
        
        $manager->remove($user);
        $manager->flush();

        $this->addFlash(
            'suppr',
            'Votre compte a bien été supprimé.'
        );

        return $this->render('home/profil.html.twig');
    }
}

<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(
        Request $request,
        EntityManagerInterface $manager,
        MailerInterface $mailer
        ): Response
    {   
        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            $contact = $form->getData();

            $manager->persist($contact);
            $manager->flush();

            // Email

            $email = (new Email())
                ->from($contact->getEmail())
                ->to('admin@runart.com')
                ->subject($contact->getSubject())
                ->html($contact->getMessage(), $contact->getName(), $contact->getFirstname(), $contact->getTelephone());

            $mailer->send($email);

            $this->addFlash(
                'success',
                'Votre message a bien été envoyé.'
            );

            return $this->redirectToRoute('index');
        }

        return $this->render('home/index.html.twig', [
            'form' => $form->createView()
        ]);
    }
}

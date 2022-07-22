<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use Symfony\Component\Mime\Email;
use App\Repository\TagsRepository;
use App\Repository\UserRepository;
use App\Repository\OeuvreRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    /**
     * @var UserRepository
     * @var OeuvreRepository
     * @var TagsRepository
     */
    private $repository_user;
    private $repository_oeuvre;
    private $repository_tag;

    public function __construct(UserRepository $repository_user, OeuvreRepository $repository_oeuvre, TagsRepository $repository_tag){
        $this->repository_user = $repository_user;
        $this->repository_oeuvre = $repository_oeuvre;
        $this->repository_tag = $repository_tag;
    }

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
        
            
            return $this->redirectToRoute('index');
        }

        $users = $this->repository_user->findAll();
        $oeuvres = $this->repository_oeuvre->findAll();
        $tags = $this->repository_tag->findAll();

        return $this->render('home/index.html.twig', [
            'form' => $form->createView(),
            "users" => $users,
            "oeuvres" => $oeuvres,
            "tags" => $tags
        ]);
    }
}

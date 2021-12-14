<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use App\Repository\ContactRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    private $contactRepository;
    public function __construct(ContactRepository $contactRepository)
    {
        $this->contactRepository = $contactRepository;
    }

   
    // public function index(Request $request, string $city = ""): Response
    // {
    //     $name = $request->query->get('name');
    //     $form = $this->FormContactBase($request);

    //     return $this->renderForm('contact/index.html.twig', [
    //         'city' => $city,
    //         'name' => $name,
    //         'contact' => $this->contactRepository->findAll(),
    //         'form' => $form,
    //     ]);
    // }
    // private function FormContactBase(Request $request){
    //     $contact = new Contact();
    //     $form = $this->createForm( ContactType::class, $contact );

    //     return $form;
    // }
    /**
     * @Route("/", name="contact")
     */
    public function index(Request $request): Response //pour afficher toute les personnes dans la liste de contact
    {
        $name = $request->query->get('name');

        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);

        dump($form->getViewData());

        if($form->isSubmitted() &&  $form->isValid()){
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($form->getData());
            $entityManager->flush();

           echo("ok en base");
        }
        return $this->renderForm('contact/index.html.twig',[
            'controller_name' => 'Contrôleur de Contact',
            'contact' => $this->contactRepository->findAll(),
            'form'=>$form,
        ]);
    }

    /**
     * @Route("/{id}", name="authId")
     */

    public function authentification(Request $request, string $id): Response // pour la requete solo pour pouvoir afficher les informations d'une personne via son id
    {
        $name = $request->query->get('name');

        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);

        dump($form->getViewData());

        if($form->isSubmitted() &&  $form->isValid()){
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($form->getData());
            $entityManager->flush();

           echo("ok en base");
        }
        return $this->renderForm('contact/index.html.twig',[
            'controller_name' => 'Contrôleur de Contact',
            'contact' => $this->contactRepository->findAll(),
            'auth'=> $this->contactRepository->find($id),
            'form'=>$form,
        ]);
    }
}
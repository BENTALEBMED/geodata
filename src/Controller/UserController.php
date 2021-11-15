<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/user")
 */
class UserController extends AbstractController
{
   
    /**
     * @Route("/login", name="user_login")   
     */
    public function login(Request $request, UserRepository $userRepository): Response
    {
        $user = new User();
        $form = $this->createFormBuilder($user)
        ->add('compte',TextType::class,[
            'attr' => [
                'Placeholder'=> 'Votre Compte'
            ]
        ])
        ->add('motpasse',PasswordType::class,[
            'attr' => [
                'Placeholder'=> 'Votre Mot de Passe'
            ]
        ])
        ->getForm();
        $form->handleRequest($request);
         
        if ($form->isSubmitted()){
            $compte = $form['compte']->getData();
            $motpasse = $form['motpasse']->getData();

            //var_dump($compte);
            //var_dump($motpasse);
            //die('test');
            $user = $userRepository->findOneBy(array('motPasse'=>$motpasse));
             if (!$user)
             {
                $message = "Compte ou Mot Passe Incorrecte";
                 
                return $this->render('user/login.html.twig',[
                   'form'=> $form->createView(),
                   'message'=>$message,
               ]);
             }
             else
             {


             }

             $role = $user->getRole();
             $nom = $user->getNom();

             $session = new Session();

             $session->set('Role',$role);
             $session->set('Nom',$nom);


             $role=$session->get('Role');
             $nom=$session->get('Nom');
 
             return $this->redirectToRoute('user_acceuil');         


        }
        return $this->render('user/login.html.twig',[
            'form'=> $form->createView()
        ]);
}
   
   
    /**
     * @Route("/", name="user_index", methods={"GET"})
     */
    public function index(UserRepository $userRepository): Response
    {
        return $this->render('user/index.html.twig', [
            'users' => $userRepository->findAll(),
        ]);
    }

   
     /**
     * @Route("/acceuil", name="user_acceuil", methods={"GET"})
     */
    public function acceuil(): Response
    {
        return $this->render('user/acceuil.html.twig');
    }

    

    /**
     * @Route("/new", name="user_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();

            return $this->redirectToRoute('user_index');
        }

        return $this->render('user/new.html.twig', [
            'user' => $user,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="user_show", methods={"GET"})
     */
    public function show(User $user): Response
    {
        return $this->render('user/show.html.twig', [
            'user' => $user,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="user_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, User $user): Response
    {
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('user_index');
        }

        return $this->render('user/edit.html.twig', [
            'user' => $user,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="user_delete", methods={"DELETE"})
     */
    public function delete(Request $request, User $user): Response
    {
        if ($this->isCsrfTokenValid('delete'.$user->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($user);
            $entityManager->flush();
        }

        return $this->redirectToRoute('user_index');
    }

}

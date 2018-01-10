<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserRegistrationFormType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class SecurityController extends Controller
{
    /**
     * @Route("/register", name="register")
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $registrationForm = $this->createForm(UserRegistrationFormType::class);
        $registrationForm->handleRequest($request);

        if ($registrationForm->isSubmitted() && $registrationForm->isValid()) {
            $em   = $this->getDoctrine()->getManager();
            $data = $registrationForm->getData();
            $user = new User();
            $user
                ->setUsername($data['username'])
                ->setEmail($data['email'])
                ->setPlainPassword($data['password']);

            $em->persist($user);
            $em->flush();

            // $argon2id$v=19$m=65536,t=2,p=1$+yfWpJB3v/3XqQIENI2IhQ$2Z9rNrcPbAOOdVrHKteZOhjjh/CqfmIHM10+HPYBpGk

            return $this->redirectToRoute('homepage');
        }

        // ['registrationForm' => $registrationForm] === compact($registrationForm)
        return $this->render('security/register.html.twig', [
            'registrationForm' => $registrationForm->createView(),
        ]);
    }
}

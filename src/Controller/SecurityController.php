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

        if ($registrationForm->isValid()) {
            $data = $registrationForm->getData();
            $user = new User();
            $user
                ->setUsername($data['username'])
                ->setEmail($data['email'])
                ->setPassword($data['password']);
        }

        // ['registrationForm' => $registrationForm] === compact($registrationForm)
        return $this->render('security/register.html.twig', [
            'registrationForm' => $registrationForm->createView(),
        ]);
    }
}

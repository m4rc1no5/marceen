<?php

namespace Marceen\KontaktBundle\Controller;

use Marceen\KontaktBundle\CommandBus\Mail\DodajMail;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class KontaktController extends Controller
{
    /**
     * Formularz konkatowy
     *
     * @param Request $request
     * @return array
     *
     * @Route("/", name="kontakt")
     * @Template()
     */
    public function indexAction(Request $request)
    {
        $email_to = 'marcin.zaremba@gmail.com';
        $mail_command = new DodajMail($email_to);

        $form = $this->createForm('kontakt', $mail_command);

        $form->handleRequest($request);

        if($form->isValid()){
            echo 'kabooom!';
        }

        return [
            'form' => $form->createView(),
        ];
    }
}

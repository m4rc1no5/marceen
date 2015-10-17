<?php

namespace Marceen\KontaktBundle\Controller;

use Marceen\KontaktBundle\CommandBus\Mail\DodajMail;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use SimpleBus\Message\Bus\MessageBus;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class KontaktController
 * @package Marceen\KontaktBundle\Controller
 *
 * @Route("/", service="marceen_kontakt.controller.kontakt")
 */
class KontaktController extends Controller
{

    /** @var MessageBus */
    private $command_bus;

    /**
     * KontaktController constructor.
     * @param MessageBus $command_bus
     */
    public function __construct(MessageBus $command_bus)
    {
        $this->command_bus = $command_bus;
    }


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
            $this->command_bus->handle($mail_command);
        }

        return [
            'form' => $form->createView(),
        ];
    }
}

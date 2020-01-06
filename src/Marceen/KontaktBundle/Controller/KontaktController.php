<?php

namespace Marceen\KontaktBundle\Controller;

use Component\HasUnitOfWork;
use Component\HasUnitOfWorkTrait;
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
class KontaktController extends Controller implements HasUnitOfWork
{
    use HasUnitOfWorkTrait;

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
        $title = $this->container->getParameter('marceen_kontakt_mail_title');
        $email_account = $this->container->getParameter('mailer_user');
        $email_to = $this->container->getParameter('marceen_kontakt_mail_to');
        $ip = $request->getClientIp();
        $mail_command = new DodajMail($title, $email_account, $email_to, $ip);

        $form = $this->createForm('kontakt', $mail_command);

        $form->handleRequest($request);

        if($form->isValid()){
            $this->command_bus->handle($mail_command);
            $this->unitOfWork->commit();

            return $this->redirectToRoute('kontakt.mail_send');
        }

        return [
            'form' => $form->createView(),
        ];
    }

    /**
     * @return array
     *
     * @Route("/mail_send", name="kontakt.mail_send")
     * @Template()
     */
    public function mailSendAction()
    {
       return [];
    }
}

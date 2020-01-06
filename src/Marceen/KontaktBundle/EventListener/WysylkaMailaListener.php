<?php
/**
 * Created by PhpStorm.
 * User: marcinos
 * Date: 18.10.15
 * Time: 12:00
 */

namespace Marceen\KontaktBundle\EventListener;


use Component\Mail;
use Marceen\KontaktBundle\Event\DodanoMailEvent;

class WysylkaMailaListener
{

    /** @var Mail */
    private $mail;

    /** @var DodanoMailEvent */
    private $dodanoMailEvent;

    /**
     * WysylkaMailaListener constructor.
     * @param Mail $mail
     */
    public function __construct(Mail $mail)
    {
        $this->mail = $mail;
    }

    public function onDodanoMail(DodanoMailEvent $event)
    {
        $this->dodanoMailEvent = $event;
        $kontakt = $this->dodanoMailEvent->getKontakt();

        //prepare mail
        $this->mail->prepare($kontakt->getTitle(), "kontakt@marceen.pl", $kontakt->getEmailTo(), 'kontakt', [
            'name' => $kontakt->getName(),
            'phone' => $kontakt->getPhone(),
            'message' => $kontakt->getMessage(),
            'dodata' => $kontakt->getDodata(),
            'ip' => $kontakt->getIp()
        ]);
    }

    public function onKernelTerminate()
    {
        if($this->dodanoMailEvent){
            $this->mail->send();
        }
    }

}
<?php
/**
 * Created by PhpStorm.
 * User: marcinos
 * Date: 18.10.15
 * Time: 01:08
 */

namespace Marceen\KontaktBundle\CommandBus\Mail;


use Marceen\KontaktBundle\Entity\Kontakt;
use Marceen\KontaktBundle\Event\DodanoMailEvent;
use Marceen\KontaktBundle\MarceenKontatEvents;
use Marceen\KontaktBundle\Repository\Doctrine\KontaktRepository;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class DodajMailHandler
{
    /** @var KontaktRepository */
    private $kontaktRepository;

    /** @var EventDispatcherInterface */
    private $eventDispatcher;

    /**
     * DodajMailHandler constructor.
     * @param KontaktRepository $kontaktRepository
     * @param EventDispatcherInterface $eventDispatcher
     */
    public function __construct(KontaktRepository $kontaktRepository, EventDispatcherInterface $eventDispatcher)
    {
        $this->kontaktRepository = $kontaktRepository;
        $this->eventDispatcher = $eventDispatcher;
    }

    public function handle(DodajMail $dodajMail)
    {
        $kontakt = new Kontakt($dodajMail->getTitle(), $dodajMail->getName(), $dodajMail->getEmailFrom(), $dodajMail->getEmailTo(), $dodajMail->getPhone(), $dodajMail->getMessage(), $dodajMail->getIp());
        $this->kontaktRepository->add($kontakt);

        //rejestrujemy event w dispatcherze
        $this->eventDispatcher->dispatch(
            MarceenKontatEvents::MAIL_ADD,
            new DodanoMailEvent($kontakt)
        );
    }
}
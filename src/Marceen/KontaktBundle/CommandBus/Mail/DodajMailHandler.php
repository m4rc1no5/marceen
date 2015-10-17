<?php
/**
 * Created by PhpStorm.
 * User: marcinos
 * Date: 18.10.15
 * Time: 01:08
 */

namespace Marceen\KontaktBundle\CommandBus\Mail;


use Marceen\KontaktBundle\Entity\Kontakt;
use Marceen\KontaktBundle\Repository\Doctrine\KontaktRepository;

class DodajMailHandler
{
    /** @var KontaktRepository */
    private $kontakt_repository;

    /**
     * DodajMailHandler constructor.
     * @param KontaktRepository $kontakt_repository
     */
    public function __construct(KontaktRepository $kontakt_repository)
    {
        $this->kontakt_repository = $kontakt_repository;
    }

    public function handle(DodajMail $dodajMail)
    {
        $kontakt = new Kontakt($dodajMail->getName(), $dodajMail->getEmailFrom(), $dodajMail->getEmailTo(), $dodajMail->getPhone(), $dodajMail->getMessage());
        $this->kontakt_repository->add($kontakt);
    }
}
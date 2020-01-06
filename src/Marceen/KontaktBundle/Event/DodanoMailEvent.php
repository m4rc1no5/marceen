<?php
/**
 * Created by PhpStorm.
 * User: marcinos
 * Date: 18.10.15
 * Time: 11:07
 */

namespace Marceen\KontaktBundle\Event;


use Marceen\KontaktBundle\Entity\Kontakt;
use Symfony\Component\EventDispatcher\Event;

class DodanoMailEvent extends Event
{

    /** @var Kontakt */
    private $kontakt;

    /** @var string */
    private $email_account;

    /**
     * DodanoMailEvent constructor.
     * @param Kontakt $kontakt
     * @param string $email_account
     */
    public function __construct(Kontakt $kontakt, $email_account)
    {
        $this->kontakt = $kontakt;
        $this->email_account = $email_account;
    }

    /**
     * @return Kontakt
     */
    public function getKontakt()
    {
        return $this->kontakt;
    }

    /**
     * @return string
     */
    public function getEmailAccount()
    {
        return $this->email_account;
    }

}
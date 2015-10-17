<?php
/**
 * Created by PhpStorm.
 * User: marcinos
 * Date: 17.10.15
 * Time: 18:10
 */

namespace Marceen\KontaktBundle\CommandBus\Mail;

class DodajMail extends MailCommand
{

    /** @var string */
    protected $email_to;

    /**
     * @param string $email_to
     */
    public function __construct($email_to)
    {
        $this->email_to = $email_to;
    }

    public static function messageName()
    {
        return 'mail.dodaj';
    }

}
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
    protected $title;

    /** @var string */
    protected $email_account;

    /** @var string */
    protected $email_to;

    /** @var string */
    protected $ip;

    /**
     * @param string $title
     * @param string $email_account
     * @param string $email_to
     * @param string $ip
     */
    public function __construct($title, $email_account, $email_to, $ip)
    {
        $this->title = $title;
        $this->email_account = $email_account;
        $this->email_to = $email_to;
        $this->ip = $ip;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getEmailAccount()
    {
        return $this->email_account;
    }

    /**
     * @return string
     */
    public function getEmailTo()
    {
        return $this->email_to;
    }

    /**
     * @return string
     */
    public function getIp()
    {
        return $this->ip;
    }

    public static function messageName()
    {
        return 'mail.dodaj';
    }

}
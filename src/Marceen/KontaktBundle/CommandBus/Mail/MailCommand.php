<?php
/**
 * Created by PhpStorm.
 * User: marcinos
 * Date: 17.10.15
 * Time: 13:47
 */

namespace Marceen\KontaktBundle\CommandBus\Mail;

use AppBundle\CommandBus\Command;
use Symfony\Component\Validator\Constraints as Assert;

abstract class MailCommand extends Command
{
    /**
     * @var string
     *
     * @Assert\NotBlank(message="Podaj swoje imię")
     * @Assert\Length(max="128")
     */
    protected $name;

    /**
     * @var string
     *
     * @Assert\Email(message="Adres email jest nieprawidłowy")
     * @Assert\NotBlank(message="Podaj swój adres email")
     * @Assert\Length(max="128")
     */
    protected $email_from;

    /**
     * @var string
     *
     * @Assert\Length(max="32")
     */
    protected $phone;

    /**
     * @var string
     *
     * @Assert\NotBlank(message="Wiadomość nie może być pusta")
     * @Assert\Length(max="2048")
     */
    protected $message;

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getEmailFrom()
    {
        return $this->email_from;
    }

    /**
     * @param string $email_from
     */
    public function setEmailFrom($email_from)
    {
        $this->email_from = $email_from;
    }

    /**
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    /**
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param string $message
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }

}
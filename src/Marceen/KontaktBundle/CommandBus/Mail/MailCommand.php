<?php
/**
 * Created by PhpStorm.
 * User: marcinos
 * Date: 17.10.15
 * Time: 13:47
 */

namespace AppBundle\CommandBus\Mail;

use AppBundle\CommandBus\Command;
use Symfony\Component\Validator\Constraints as Assert;

abstract class MailCommand extends Command
{
    /**
     * @var string
     *
     * @Assert\NotBlank()
     * @Assert\Length(max="128")
     */
    protected $name;

    /**
     * @var string
     *
     * @Assert\Email()
     * @Assert\NotBlank()
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
     * @Assert\NotBlank()
     * @Assert\Length(max="2048")
     */
    protected $message;
}
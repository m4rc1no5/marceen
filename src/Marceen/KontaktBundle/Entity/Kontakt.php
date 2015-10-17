<?php
/**
 * Created by PhpStorm.
 * User: marcinos
 * Date: 17.10.15
 * Time: 16:24
 */

namespace Marceen\KontaktBundle\Entity;

use AppBundle\Entity\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Kontakt
 * @package Marceen\KontaktBundle\Entity
 *
 * @ORM\Entity
 * @ORM\Table(name="kontakt")
 */
class Kontakt extends Entity
{
    /**
     * @var string
     *
     * @ORM\Column(type="string", length=128)
     */
    protected $name;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=128)
     */
    protected $email_from;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=128)
     */
    protected $email_to;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=32)
     */
    protected $phone;

    /**
     * @var string
     *
     * @ORM\Column(type="text")
     */
    protected $message;

    /**
     * Kontakt constructor.
     * @param string $name
     * @param string $email_from
     * @param string $email_to
     * @param string $phone
     * @param string $message
     */
    public function __construct($name, $email_from, $email_to, $phone, $message)
    {
        $this->name = $name;
        $this->email_from = $email_from;
        $this->email_to = $email_to;
        $this->phone = $phone;
        $this->message = $message;
    }


    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get emailFrom
     *
     * @return string
     */
    public function getEmailFrom()
    {
        return $this->email_from;
    }

    /**
     * Get emailTo
     *
     * @return string
     */
    public function getEmailTo()
    {
        return $this->email_to;
    }

    /**
     * Get phone
     *
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Get message
     *
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

}

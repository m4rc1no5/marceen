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
     * Set name
     *
     * @param string $name
     *
     * @return Kontakt
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
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
     * Set emailFrom
     *
     * @param string $emailFrom
     *
     * @return Kontakt
     */
    public function setEmailFrom($emailFrom)
    {
        $this->email_from = $emailFrom;

        return $this;
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
     * Set emailTo
     *
     * @param string $emailTo
     *
     * @return Kontakt
     */
    public function setEmailTo($emailTo)
    {
        $this->email_to = $emailTo;

        return $this;
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
     * Set phone
     *
     * @param string $phone
     *
     * @return Kontakt
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
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
     * Set message
     *
     * @param string $message
     *
     * @return Kontakt
     */
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
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

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set dodata
     *
     * @param \DateTime $dodata
     *
     * @return Kontakt
     */
    public function setDodata($dodata)
    {
        $this->dodata = $dodata;

        return $this;
    }

    /**
     * Get dodata
     *
     * @return \DateTime
     */
    public function getDodata()
    {
        return $this->dodata;
    }
}

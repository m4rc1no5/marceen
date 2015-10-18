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

    /**
     * DodanoMailEvent constructor.
     * @param Kontakt $kontakt
     */
    public function __construct(Kontakt $kontakt)
    {
        $this->kontakt = $kontakt;
    }

    /**
     * @return Kontakt
     */
    public function getKontakt()
    {
        return $this->kontakt;
    }

}
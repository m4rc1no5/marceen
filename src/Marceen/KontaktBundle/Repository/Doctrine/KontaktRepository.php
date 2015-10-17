<?php
/**
 * Created by PhpStorm.
 * User: marcinos
 * Date: 18.10.15
 * Time: 01:16
 */

namespace Marceen\KontaktBundle\Repository\Doctrine;

use AppBundle\Repository\DoctrineRepository;
use Marceen\KontaktBundle\Entity\Kontakt;

class KontaktRepository extends DoctrineRepository
{
    public function add(Kontakt $kontakt)
    {
        $this->doAdd($kontakt);
    }

    protected function getEntityClassName()
    {
        return 'Marceen\KontaktBundle\Entity\Kontakt';
    }
}
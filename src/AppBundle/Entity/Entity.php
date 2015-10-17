<?php
/**
 * Created by PhpStorm.
 * User: marcinos
 * Date: 17.10.15
 * Time: 17:27
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

abstract class Entity
{
    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(type="datetime")
     */
    protected $dodata;
}
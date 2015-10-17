<?php
/**
 * Created by PhpStorm.
 * User: marcinos
 * Date: 17.10.15
 * Time: 13:49
 */

namespace AppBundle\CommandBus;


use SimpleBus\Message\Name\NamedMessage;

abstract class Command implements NamedMessage
{

}
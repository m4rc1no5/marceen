<?php
/**
 * Created by PhpStorm.
 * User: marcinos
 * Date: 18.10.15
 * Time: 10:29
 */

namespace Component;


interface HasUnitOfWork
{
    public function setUnitOfWork(UnitOfWork $unitOfWork);
}
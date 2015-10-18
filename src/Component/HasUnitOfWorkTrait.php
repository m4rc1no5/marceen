<?php
/**
 * Created by PhpStorm.
 * User: marcinos
 * Date: 18.10.15
 * Time: 10:20
 */

namespace Component;


trait HasUnitOfWorkTrait
{

    /** @var UnitOfWork */
    protected $unitOfWork;

    /**
     * @param UnitOfWork $unitOfWork
     */
    public function setUnitOfWork(UnitOfWork $unitOfWork)
    {
        $this->unitOfWork = $unitOfWork;
    }

}
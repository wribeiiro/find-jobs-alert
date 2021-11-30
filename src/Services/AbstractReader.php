<?php

namespace App\Services;

use App\Entities\Job;
use App\Interfaces\ReaderInterface;

abstract class AbstractReader implements ReaderInterface
{   
    /**
     *
     * @return Job[]
     */
    abstract function readJobs(): array;
}
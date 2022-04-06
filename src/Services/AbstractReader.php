<?php

namespace App\Services;

use App\ValueObjects\Job;
use App\Contracts\ReaderContract;

abstract class AbstractReader implements ReaderContract
{
    /**
     *
     * @return Job[]
     */
    abstract function readJobs(): array;
}
<?php

namespace App\Contracts;

use App\ValueObjects\Job;

interface ReaderContract
{
    /**
     *
     * @return Job[]
     */
    public function readJobs(): array;
}
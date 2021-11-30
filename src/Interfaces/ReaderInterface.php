<?php

namespace App\Interfaces;

use App\Entities\Job;

interface ReaderInterface
{
    /**
     *
     * @return Job[]
     */
    public function readJobs(): array;
}
<?php

namespace App\Services;

use App\Interfaces\ReaderInterface;

abstract class AbstractReader implements ReaderInterface
{   
    abstract function readJobs();
}
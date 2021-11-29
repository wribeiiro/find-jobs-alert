<?php

namespace App\Factories;

use App\Enums\CompanyJobs;
use App\Interfaces\ReaderInterface;
use App\Services\{ReaderJobSoftExpert, ReaderJobPicpay};

class ReaderFactory 
{
    public static function getClass(string $readerName): ReaderInterface
    {
        switch ($readerName) {
            case CompanyJobs::SOFTEXPERT:
                return new ReaderJobSoftExpert();
            case CompanyJobs::PICPAY:
                return new ReaderJobPicpay();
            default:
                throw new \InvalidArgumentException('Class was not defined or not exists!');
        }
    } 
    
}
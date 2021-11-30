<?php

namespace App\Factories;

use App\Enums\CompanyJobs;
use App\Interfaces\ReaderInterface;
use App\Services\{ReaderJobSoftExpert, ReaderJobPicpay, ReaderJobPagarme};

class ReaderFactory 
{
    public static function getClass(string $readerName): ReaderInterface
    {
        switch ($readerName) {
            case CompanyJobs::SOFTEXPERT:
                return new ReaderJobSoftExpert();
            case CompanyJobs::PICPAY:
                return new ReaderJobPicpay();
            case CompanyJobs::PAGARME:
                return new ReaderJobPagarme();
            default:
                throw new \InvalidArgumentException('Class was not defined or not exists!');
        }
    } 
    
}
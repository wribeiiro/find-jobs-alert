<?php

namespace App\Factories;

use App\Exceptions\ReaderJobNotFoundException;
use App\Enums\CompanyJobs;
use App\Contracts\ReaderContract;
use App\Services\{ReaderJobSoftExpert, ReaderJobPicpay, ReaderJobPagarme, ReaderJobGlobo};

class ReaderFactory
{
    /**
     * Return an object of ReaderJob
     *
     * @param string $readerName
     * @return ReaderContract
     * @throws InvalidArgumentException
     */
    public static function getClass(string $readerName): ReaderContract
    {
        return match ($readerName) {
            CompanyJobs::Softexpert->value => new ReaderJobSoftExpert(),
            CompanyJobs::Picpay->value => new ReaderJobPicpay(),
            CompanyJobs::Pagarme->value => new ReaderJobPagarme(),
            CompanyJobs::Globo->value => new ReaderJobGlobo(),
            default => throw new ReaderJobNotFoundException('Class was not defined or not exists!')
        };
    }
}

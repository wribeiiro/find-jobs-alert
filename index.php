<?php

require_once './vendor/autoload.php';

use App\Factories\ReaderFactory;
use App\Enums\CompanyJobs;

print_r([
    ReaderFactory::build(CompanyJobs::Softexpert->value)->readJobs(),
    ReaderFactory::build(CompanyJobs::Pagarme->value)->readJobs(),
    ReaderFactory::build(CompanyJobs::Globo->value)->readJobs(),
    ReaderFactory::build(CompanyJobs::Picpay->value)->readJobs(),
]);

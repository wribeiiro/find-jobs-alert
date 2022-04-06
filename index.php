<?php

require_once './vendor/autoload.php';

use App\Factories\ReaderFactory;

print_r([
    ReaderFactory::getClass('softexpert')->readJobs(),
    ReaderFactory::getClass('pagarme')->readJobs(),
    ReaderFactory::getClass('globo')->readJobs(),
    ReaderFactory::getClass('picpay')->readJobs(),
]);

<?php

require_once './vendor/autoload.php';

use App\Factories\ReaderFactory;

$softJobs = ReaderFactory::getClass('softexpert');
$picJobs = ReaderFactory::getClass('picpay');
$pagarme = ReaderFactory::getClass('pagarme');
$globo = ReaderFactory::getClass('globo');

$jobs = [
    $softJobs->readJobs(),
    $picJobs->readJobs(),
    $pagarme->readJobs(),
    $globo->readJobs()
];

print_r($jobs);
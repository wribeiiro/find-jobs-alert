<?php

require_once './vendor/autoload.php';

use App\Factories\ReaderFactory;

$softJobs = ReaderFactory::getClass('softexpert');
$picJobs = ReaderFactory::getClass('picpay');
$pagarme = ReaderFactory::getClass('pagarme');

$jobs = [
    $softJobs->readJobs(),
    $picJobs->readJobs(),
    $pagarme->readJobs()
];

print_r($jobs);
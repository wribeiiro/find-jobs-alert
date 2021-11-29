<?php

require_once './vendor/autoload.php';

use App\Factories\ReaderFactory;

$reader = ReaderFactory::getClass('softexpert');
$jobs = $reader->readJobs();

print_r($jobs);
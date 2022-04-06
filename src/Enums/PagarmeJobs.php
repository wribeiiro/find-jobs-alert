<?php

namespace App\Enums;

enum PagarmeJobs: string
{
    case Endpoint = 'https://boards.greenhouse.io/pagarme';
    case Element = '.level-1';
}
<?php

namespace App\Entities;
use App\Entities\BaseJobType;

class PagarmeJobType extends BaseJobType
{
    public function __construct()
    {
        parent::__construct('https://boards.greenhouse.io/pagarme', '.level-1');
    }
}
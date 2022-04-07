<?php

namespace App\Entities;

use App\Entities\BaseJobType;

class SoftexpertJobType extends BaseJobType
{
    public function __construct()
    {
        parent::__construct('https://softexpert.hire.trakstar.com', '.list-item');
    }
}
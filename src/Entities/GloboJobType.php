<?php

namespace App\Entities;

use App\Entities\BaseJobType;

class GloboJobType extends BaseJobType
{
    public function __construct()
    {
        parent::__construct('https://vempraglobo.hire.trakstar.com', '.list-item');
    }
}
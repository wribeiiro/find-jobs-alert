<?php

namespace App\Entities;

use App\Entities\BaseJobType;

class PicpayJobType extends BaseJobType
{
    public function __construct()
    {
        parent::__construct('https://picpay.gupy.io', 'table tr[data-department="Tecnologia"]');
    }
}
<?php

namespace App\Enums;

enum PicpayJobs: string
{
    case Endpoint = 'https://picpay.gupy.io';
    case Element = 'table tr[data-department="Tecnologia"]';
}
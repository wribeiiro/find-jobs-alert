<?php

namespace App\Contracts;

interface JobContract
{
    public function getEndpoint(): string;
    public function getElementToFind(): string;
}
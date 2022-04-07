<?php

namespace App\Entities;

use App\Contracts\JobContract;

abstract class BaseJobType implements JobContract
{
    public function __construct(
        protected string $endpoint,
        protected string $elementToFind
    ) {

    }

    public function getEndpoint(): string
    {
        return $this->endpoint;
    }

    public function getElementToFind(): string
    {
        return $this->elementToFind;
    }

    /**
     * Serialized data
     *
     * @return array
     */
    public function jsonSerialize(): array
    {
        return [
            'endpoint' => $this->endpoint,
            'elementToFind' => $this->elementToFind
        ];
    }
}
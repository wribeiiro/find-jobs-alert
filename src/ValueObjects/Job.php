<?php

namespace App\ValueObjects;

class Job
{
    public function __construct(
        private string $jobName,
        private string $local,
        private string $period,
        private string $area,
        private string $link,
    ) {

    }

    /**
     * Serialized data
     *
     * @return array
     */
    public function jsonSerialize(): array
    {
        return [
            'jobName' => $this->jobName,
            'local' => $this->local,
            'period' => $this->period,
            'area' => $this->area,
            'link' => $this->link
        ];
    }
}
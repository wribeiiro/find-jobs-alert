<?php

use PHPUnit\Framework\TestCase;
use App\Factories\ReaderFactory;
use App\Enums\CompanyJobs;
use App\Contracts\ReaderContract;

class ReaderJobGloboTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    public function testShouldReturnAnArrayOfJobs()
    {
        $mockFactory = ReaderFactory::build(CompanyJobs::Globo->value);
        $jobs = $mockFactory->readJobs();

        $this->assertIsArray($jobs);
    }

    public function testShouldReturnAnObjectReaderContract()
    {
        $reader = ReaderFactory::build(CompanyJobs::Globo->value);
        $this->assertInstanceOf(ReaderContract::class, $reader);
    }
}
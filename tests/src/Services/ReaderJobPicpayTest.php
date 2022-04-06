<?php

use PHPUnit\Framework\TestCase;
use App\Factories\ReaderFactory;
use App\Enums\CompanyJobs;
use App\Contracts\ReaderContract;

class ReaderJobPicpayTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    public function testShouldReturnAnArrayOfJobs()
    {
        $mockFactory = ReaderFactory::getClass(CompanyJobs::Picpay->value);
        $jobs = $mockFactory->readJobs();

        $this->assertIsArray($jobs);
    }

    public function testShouldReturnAnObjectReaderContract()
    {
        $reader = ReaderFactory::getClass(CompanyJobs::Picpay->value);
        $this->assertInstanceOf(ReaderContract::class, $reader);
    }
}
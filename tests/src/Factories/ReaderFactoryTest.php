<?php

use PHPUnit\Framework\TestCase;
use App\Factories\ReaderFactory;
use App\Enums\CompanyJobs;
use App\Contracts\ReaderContract;
use App\Exceptions\ReaderJobNotFoundException;

class ReaderFactoryTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    public function testShouldReturnAnArrayOfJobs()
    {
        $mockFactory = ReaderFactory::getClass(CompanyJobs::Softexpert->value);
        $jobs = $mockFactory->readJobs();

        $this->assertIsArray($jobs);
        $this->assertTrue(count($jobs) > 0);
    }

    public function testShouldReturnReaderJobNotFoundException()
    {
        $this->expectException(ReaderJobNotFoundException::class);
        $this->expectExceptionMessage('Class was not defined or not exists!');

        ReaderFactory::getClass('vai dar ruim quer ver?');
    }

    public function testShouldReturnAnObjectReaderContract()
    {
        $reader = ReaderFactory::getClass(CompanyJobs::Softexpert->value);
        $this->assertInstanceOf(ReaderContract::class, $reader);
    }
}
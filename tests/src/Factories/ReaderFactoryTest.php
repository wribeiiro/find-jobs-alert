<?php

use PHPUnit\Framework\TestCase;
use App\Factories\ReaderFactory;
use App\Enums\CompanyJobs;
use App\Interfaces\ReaderInterface;

class ReaderFactoryTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    public function testShouldBeReturnAnArrayOfJobs()
    {
        $mockFactory = ReaderFactory::getClass(CompanyJobs::SOFTEXPERT);
        $jobs = $mockFactory->readJobs();

        $this->assertIsArray($jobs);
        $this->assertTrue(count($jobs) > 0);
    }

    public function testShouldBeReturnAnExceptionGeneric()
    {   
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('Class was not defined or not exists!');

        ReaderFactory::getClass('chama o amir que deu ruim aqui');
    }

    public function testShouldBeReturnAnObjectReaderInterface()
    {   
        $reader = ReaderFactory::getClass(CompanyJobs::SOFTEXPERT);
        $this->assertInstanceOf(ReaderInterface::class, $reader);
    }
}
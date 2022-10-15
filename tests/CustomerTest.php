<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\Entity\Customer;

class CustomerTest extends TestCase
{
    protected function setUp(): void
    {
        $this->customer = new Customer();
    }

    public function testIfCustomerNameHasOnlyOneName(): void
    {
        $this->expectException('App\Exception\InvalidNameException');
        $this->expectExceptionMessage('You must provide at least 2 names');

        $this->customer->setName('Mary');
    }

    public function testIfCustomerNameIsCorrect(): void
    {
        $this->customer->setName('Valid Name');

        $this->assertEquals('Valid Name', $this->customer->getName());
        $this->assertIsString($this->customer->getName());
    }
}

<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\Entity\Customer;
use App\Exception\InvalidAgeException;
use App\Exception\InvalidEmailException;

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

    public function testIfCustomerIsUnderEighteenYearsOld(): void
    {
        $this->expectException(InvalidAgeException::class);
        $this->expectExceptionMessage('Only adults allowed');

        $this->customer->setBirthDate('2005-01-01');
    }

    public function testIfCustomerIsOverEighteenYearsOld(): void
    {
        $this->customer->setBirthDate('2001-01-01');

        $this->assertEquals('2001-01-01', $this->customer->getBirthDate());
        $this->assertIsString($this->customer->getBirthDate());
    }

    public function testIfCustomerEmailIsInvalid()
    {
        $this->expectException(InvalidEmailException::class);
        $this->expectExceptionMessage('Invalid E-mail');

        $this->customer->setEmail('teste');
    }

    public function testIfCustomerEmailIsValid()
    {
        $this->customer->setEmail('teste@email.com');

        $this->assertEquals('teste@email.com', $this->customer->getEmail());
        $this->assertIsString($this->customer->getEmail());
    }
}

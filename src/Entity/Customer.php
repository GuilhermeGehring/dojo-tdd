<?php

namespace App\Entity;

use App\Exception\InvalidNameException;

class Customer
{
    private $name;

    public function getName()
    {
        return $this->name;
    }

    public function setName(string $name)
    {
        if (count(explode(" ", $name)) < 2) {
            throw new InvalidNameException('You must provide at least 2 names');
        }

        $this->name = $name;
    }
}

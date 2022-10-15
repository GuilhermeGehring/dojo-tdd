<?php

namespace App\Entity;

use App\Exception\InvalidAgeException;
use App\Exception\InvalidEmailException;
use App\Exception\InvalidNameException;
use DateTime;

class Customer
{
    private $name;
    private $birthDate;
    private $email;

    /**
     * Get the value of name
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */
    public function setName(string $name): self
    {
        if (count(explode(" ", $name)) < 2) {
            throw new InvalidNameException('You must provide at least 2 names');
        }

        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of birthDate
     */
    public function getBirthDate(): string
    {
        return $this->birthDate;
    }

    /**
     * Set the value of birthDate
     *
     * @return  self
     */
    public function setBirthDate(string $birthDate): self
    {
        if ((int) (new DateTime())->diff(new DateTime($birthDate))->format('%y') < 18) {
            throw new InvalidAgeException('Only adults allowed');
        }

        $this->birthDate = $birthDate;

        return $this;
    }

    /**
     * Get the value of email
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */
    public function setEmail(string $email): self
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidEmailException('Invalid E-mail');
        }

        $this->email = $email;

        return $this;
    }
}

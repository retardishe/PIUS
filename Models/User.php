<?php

namespace Models;

use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Regex;

class User implements IValidated
{
    public function __construct(
        public int $id,
        public string $email,
        public string $password,
        private \DateTime $createdAt = new \DateTime('now')
    )
    {
    }

    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }

    public function getMail(): string
    {
        return $this->email;
    }

    public function getValidations(): array
    {
        return [
            "id" => [new NotBlank()],
            "email" => [new NotBlank(), new Regex([
                'pattern' => '/@/',
                'match' => true,
                'message' => 'Need @'
            ])],
            "password" => [new NotBlank(), new Length(['min' => 8])]
        ];
    }
}
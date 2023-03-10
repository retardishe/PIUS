<?php

namespace Models;

use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class Comment implements IValidated
{
    public function __construct(
        public User $user,
        public string $text,
    )
    {
    }

    public function getAuthor(): string
    {
        return $this->user->getMail();
    }
    public function getValidations(): array
    {
        return [
            "user" => [new NotBlank()],
            "text" => [new NotBlank(), new Length(['max' => 30])]
        ];
    }
}
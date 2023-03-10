<?php

namespace Validators;

use Symfony\Component\Validator\Validation;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class Validator
{
    protected ValidatorInterface $validator;
    public function __construct()
    {
        $this->validator = Validation::createValidator();
    }

    public function validate($model): array
    {
        foreach ($model->getValidations() as $key => $rule) {
            $errors[] = $this->validator->validate($model->$key, $rule);
        }

        return $errors ?? [];
    }

    public function getErrorMessages($errors):  array
    {
        foreach ($errors as $error) {
            foreach ($error as $e) {
                $errorsStrings[] = $e->getMessage() . "\n";
            }
        }

        return $errorsStrings ?? [];
    }
}
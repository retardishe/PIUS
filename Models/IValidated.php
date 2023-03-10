<?php

namespace Models;

interface IValidated
{
    public function getValidations(): array;
}
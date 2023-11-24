<?php

namespace App\Interfaces;

interface BaseValidationServiceInterface
{
    public function filterValidation(array $data);

    public function storeValidation(array $data);
}

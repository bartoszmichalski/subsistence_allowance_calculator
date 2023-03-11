<?php

namespace App\Allowance\Application\Service\CountryAllowanceCalculator\Calculator;

interface AllowanceCalculatorInterface
{
    public function calc(int $workDays): float;
}

<?php

namespace App\Allowance\Application\Service\CountryAllowanceCalculator\Calculator;

class GBAllowanceCalculator extends AbstractCountryCalculator implements AllowanceCalculatorInterface
{
    protected float $baseAmount = 75;

    protected array $modifiers = [
        5 => [
            'operation' => '*',
            'argument' => 4,
        ]
    ];
}

<?php

namespace App\Allowance\Application\Service\CountryAllowanceCalculator\Calculator;

class PLAllowanceCalculator extends AbstractCountryCalculator implements AllowanceCalculatorInterface
{
    protected float $baseAmount = 10;

    protected array $modifiers = [
        4 => [
            'operation' => '*',
            'argument' => 2,
        ]
    ];
}

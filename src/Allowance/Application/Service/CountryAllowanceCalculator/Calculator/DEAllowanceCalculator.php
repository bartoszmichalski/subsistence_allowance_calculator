<?php

namespace App\Allowance\Application\Service\CountryAllowanceCalculator\Calculator;

class DEAllowanceCalculator extends AbstractCountryCalculator implements AllowanceCalculatorInterface
{
    protected float $baseAmount = 50;

    protected array $modifiers = [
        3 => [
            'operation' => '*',
            'argument' => 1.75,
        ]
    ];
}

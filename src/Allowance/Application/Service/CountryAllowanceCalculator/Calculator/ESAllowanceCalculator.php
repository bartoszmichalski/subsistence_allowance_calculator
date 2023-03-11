<?php

namespace App\Allowance\Application\Service\CountryAllowanceCalculator\Calculator;

class ESAllowanceCalculator extends AbstractCountryCalculator implements AllowanceCalculatorInterface
{
    protected float $baseAmount = 150;

    protected array $modifiers = [
        4 => [
            'operation' => '-',
            'argument' => 50,
        ],
        6 => [
            'operation' => '-',
            'argument' => 25,
        ]
    ];
}

<?php

namespace App\Allowance\Application\Service\CountryAllowanceCalculator\Calculator;

class PLAllowanceCalculator implements AllowanceCalculatorInterface
{
    const BASE_AMOUNT = 10;

    const MODIFIERS = [
        4 => [
            'operation' => '*',
            'argument' => 2,
        ]
    ];
    public function calc(int $workDays): int
    {
        $sum = 0;
        $currentAllowance = self::BASE_AMOUNT;
        for ($i = 1; $i <= $workDays; $i++){
            if (isset(self::MODIFIERS[$i])) {
                $currentAllowance = $currentAllowance * self::MODIFIERS[$i]['argument'];
            }
            $sum += $currentAllowance;
        }

        return $sum;
    }
}

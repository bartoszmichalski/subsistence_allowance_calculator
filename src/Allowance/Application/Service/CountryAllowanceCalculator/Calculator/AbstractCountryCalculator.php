<?php

namespace App\Allowance\Application\Service\CountryAllowanceCalculator\Calculator;

abstract class AbstractCountryCalculator
{
    public function calc(int $workDays): float
    {
        $sum = 0;
        $currentAllowance = $this->baseAmount;
        for ($i = 1; $i <= $workDays; $i++) {
            if (isset($this->modifiers[$i])) {
                $currentAllowance = $this->mathCalc($currentAllowance, $this->modifiers[$i]['argument'], $this->modifiers[$i]['operation']);
            }
            $sum += $currentAllowance;
        }

        return $sum;
    }

    public function mathCalc($valueOne, $valueTwo, $operator): float
    {
        return match($operator) {
            '*' => $valueOne * $valueTwo,
            '-' => $valueOne - $valueTwo,
            default => throw new \Exception('Nieobsługiwany operator')
        };
    }
}

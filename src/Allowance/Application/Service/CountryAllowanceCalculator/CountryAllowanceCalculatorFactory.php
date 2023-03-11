<?php

namespace App\Allowance\Application\Service\CountryAllowanceCalculator;

use App\Allowance\Application\Service\CountryAllowanceCalculator\Calculator\AllowanceCalculatorInterface;
use App\Allowance\Application\Service\CountryAllowanceCalculator\Calculator\DEAllowanceCalculator;
use App\Allowance\Application\Service\CountryAllowanceCalculator\Calculator\ESAllowanceCalculator;
use App\Allowance\Application\Service\CountryAllowanceCalculator\Calculator\GBAllowanceCalculator;
use App\Allowance\Application\Service\CountryAllowanceCalculator\Calculator\PLAllowanceCalculator;
use App\Country\Domain\CountryCode;

class CountryAllowanceCalculatorFactory
{
    public function create(CountryCode $countryCode): AllowanceCalculatorInterface
    {
        return match ($countryCode) {
            CountryCode::PL => new PLAllowanceCalculator(),
            CountryCode::DE => new DEAllowanceCalculator(),
            CountryCode::GB => new GBAllowanceCalculator(),
            CountryCode::ES => new ESAllowanceCalculator(),
            default => throw new \Exception('Nieobługiwany kraj')
        };
    }
}

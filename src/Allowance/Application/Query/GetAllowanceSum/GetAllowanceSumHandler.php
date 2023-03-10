<?php

use App\Allowance\Application\Service\CountryAllowanceCalculator\CountryAllowanceCalculatorFactory;
use App\Allowance\Application\Service\WorkDaysCalculator;

class GetAllowanceSumHandler
{
    public function __construct(
        private readonly WorkDaysCalculator $workDaysCalculator,
        private readonly CountryAllowanceCalculatorFactory $factory
    ) {
    }

    public function __invoke(GetAllowanceSumQuery $query)
    {
        $workDaysAmount = $this->workDaysCalculator->calculate(
            $query->startDate,
            $query->days
        );

        $countryAllowanceCalculator = $this->factory->create($query->countryCode);
        
        return $countryAllowanceCalculator->calc($workDaysAmount);
    }
}

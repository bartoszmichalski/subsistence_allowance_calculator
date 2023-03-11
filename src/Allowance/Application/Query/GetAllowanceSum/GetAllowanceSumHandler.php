<?php

namespace App\Allowance\Application\Query\GetAllowanceSum;

use App\Allowance\Application\Service\CountryAllowanceCalculator\CountryAllowanceCalculatorFactory;
use App\Allowance\Application\Service\WorkDaysCalculator;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

readonly class GetAllowanceSumHandler
{
    public function __construct(
        private WorkDaysCalculator                $workDaysCalculator,
        private CountryAllowanceCalculatorFactory $factory
    ) {
    }

    #[AsMessageHandler]
    public function __invoke(GetAllowanceSumQuery $query): float
    {
        $workDaysAmount = $this->workDaysCalculator->calculate(
            $query->startDate,
            $query->days
        );

        $countryAllowanceCalculator = $this->factory->create($query->countryCode);

        return $countryAllowanceCalculator->calc($workDaysAmount);
    }
}

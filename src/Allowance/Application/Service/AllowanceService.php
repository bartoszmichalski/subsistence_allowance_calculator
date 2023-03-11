<?php

namespace App\Allowance\Application\Service;

use App\Allowance\Application\Query\GetAllowanceSum\GetAllowanceSumQuery;
use App\Country\Domain\CountryCode;
use DateTime;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Messenger\Stamp\HandledStamp;

readonly class AllowanceService
{
    public function __construct(
        private MessageBusInterface $bus
    ) {
    }

    public function calculate(
        CountryCode $countryCode,
        DateTime    $startDate,
        DateTime    $endDate,
    ) {
        $envelope = $this->bus->dispatch(
            new GetAllowanceSumQuery(
                $startDate,
                $endDate,
                $countryCode
            )
        );

        $handledStamp = $envelope->last(HandledStamp::class);

        return $handledStamp->getResult();
    }
}

<?php

namespace App\Allowance\Application\Service;

use App\Allowance\Application\Query\GetAllowanceSum\GetAllowanceSumQuery;
use App\Country\Domain\CountryCode;
use DateTime;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Messenger\Stamp\HandledStamp;

class AllowanceService
{
    public function __construct(
        private MessageBusInterface $bus
    ) {
    }

    public function calculate(
        CountryCode $countryCode,
         DateTime $startDate,
         int $days,
    ) {
        $envelope =  $this->bus->dispatch(new GetAllowanceSumQuery(
            $startDate, $days, $countryCode
        ));

        $handledStamp = $envelope->last(HandledStamp::class);
        return $handledStamp->getResult();
    }
}

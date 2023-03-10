<?php

use App\Country\Domain\CountryCode;

readonly class GetAllowanceSumQuery
{
    public function __construct(
        public DateTime $startDate,
        public int $days,
        public CountryCode $countryCode,
    ) {
    }
}

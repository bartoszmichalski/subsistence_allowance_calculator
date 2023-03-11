<?php
namespace App\Allowance\Application\Query\GetAllowanceSum;

use App\Country\Domain\CountryCode;
use DateTime;

readonly class GetAllowanceSumQuery
{
    public function __construct(
        public DateTime $startDate,
        public DateTime $endDate,
        public CountryCode $countryCode,
    ) {
    }
}

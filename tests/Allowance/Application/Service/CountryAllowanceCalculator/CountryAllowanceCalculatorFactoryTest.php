<?php

namespace Allowance\Application\Service\CountryAllowanceCalculator;

use App\Allowance\Application\Service\CountryAllowanceCalculator\Calculator\PLAllowanceCalculator;
use App\Allowance\Application\Service\CountryAllowanceCalculator\CountryAllowanceCalculatorFactory;
use App\Country\Domain\CountryCode;
use PHPUnit\Framework\TestCase;

class CountryAllowanceCalculatorFactoryTest extends TestCase
{
    private CountryAllowanceCalculatorFactory $factory;

    protected function setUp(): void
    {
        parent::setUp();
        $this->factory = new CountryAllowanceCalculatorFactory();
    }

    public function testCreate()
    {
        $sut = $this->factory->create(CountryCode::PL);

        $this->assertInstanceOf(PLAllowanceCalculator::class, $sut);
    }
}

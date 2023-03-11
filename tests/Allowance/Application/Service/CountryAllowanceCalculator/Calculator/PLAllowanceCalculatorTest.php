<?php

namespace Allowance\Application\Service\CountryAllowanceCalculator\Calculator;

use App\Allowance\Application\Service\CountryAllowanceCalculator\Calculator\PLAllowanceCalculator;
use PHPUnit\Framework\TestCase;

class PLAllowanceCalculatorTest extends TestCase
{
    private PLAllowanceCalculator $calculator;

    protected function setUp(): void
    {
        parent::setUp();
        $this->calculator = new PLAllowanceCalculator();
    }

    public function testCalcOneDay()
    {
        $result = $this->calculator->calc(1);

        $this->assertEquals(10, $result);
    }

    public function testCalcTwoDays()
    {
        $result = $this->calculator->calc(2);

        $this->assertEquals(20, $result);
    }

    public function testCalcTenDays()
    {
        $result = $this->calculator->calc(8);

        $this->assertEquals(130, $result);
    }
}

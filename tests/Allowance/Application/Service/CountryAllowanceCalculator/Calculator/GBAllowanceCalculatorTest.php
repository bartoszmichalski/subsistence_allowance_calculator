<?php

namespace Allowance\Application\Service\CountryAllowanceCalculator\Calculator;

use App\Allowance\Application\Service\CountryAllowanceCalculator\Calculator\DEAllowanceCalculator;
use App\Allowance\Application\Service\CountryAllowanceCalculator\Calculator\GBAllowanceCalculator;
use PHPUnit\Framework\TestCase;

class GBAllowanceCalculatorTest extends TestCase
{
    private GBAllowanceCalculator $calculator;

    protected function setUp(): void
    {
        parent::setUp();
        $this->calculator = new GBAllowanceCalculator();
    }

    public function testCalcOneDay()
    {
        $result = $this->calculator->calc(1);

        $this->assertEquals(75, $result);
    }

    public function testCalcTwoDays()
    {
        $result = $this->calculator->calc(2);

        $this->assertEquals(150, $result);
    }

    public function testCalcFiveDays()
    {
        $result = $this->calculator->calc(5);

        $this->assertEquals(600, $result);
    }
}

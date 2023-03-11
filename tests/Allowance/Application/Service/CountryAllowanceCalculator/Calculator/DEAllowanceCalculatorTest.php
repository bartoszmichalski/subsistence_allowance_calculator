<?php

namespace Allowance\Application\Service\CountryAllowanceCalculator\Calculator;

use App\Allowance\Application\Service\CountryAllowanceCalculator\Calculator\DEAllowanceCalculator;
use PHPUnit\Framework\TestCase;

class DEAllowanceCalculatorTest extends TestCase
{
    private DEAllowanceCalculator $calculator;

    protected function setUp(): void
    {
        parent::setUp();
        $this->calculator = new DEAllowanceCalculator();
    }

    public function testCalcOneDay()
    {
        $result = $this->calculator->calc(1);

        $this->assertEquals(50, $result);
    }

    public function testCalcTwoDays()
    {
        $result = $this->calculator->calc(2);

        $this->assertEquals(100, $result);
    }

    public function testCalcThreeDays()
    {
        $result = $this->calculator->calc(3);

        $this->assertEquals(187.50, $result);
    }
}

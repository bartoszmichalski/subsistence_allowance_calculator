<?php

namespace Allowance\Application\Service\CountryAllowanceCalculator\Calculator;

use App\Allowance\Application\Service\CountryAllowanceCalculator\Calculator\ESAllowanceCalculator;
use PHPUnit\Framework\TestCase;

class ESAllowanceCalculatorTest extends TestCase
{
    private ESAllowanceCalculator $calculator;

    protected function setUp(): void
    {
        parent::setUp();
        $this->calculator = new ESAllowanceCalculator();
    }

    public function testCalcOneDay()
    {
        $result = $this->calculator->calc(1);

        $this->assertEquals(150, $result);
    }

    public function testCalcTwoDays()
    {
        $result = $this->calculator->calc(2);

        $this->assertEquals(300, $result);
    }

    public function testCalcFourDays()
    {
        $result = $this->calculator->calc(4);

        $this->assertEquals(550, $result);
    }
}

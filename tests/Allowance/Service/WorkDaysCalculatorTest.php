<?php

use PHPUnit\Framework\TestCase;
use App\Allowance\Application\Service\WorkDaysCalculator;

class WorkDaysCalculatorTest extends TestCase
{
    private WorkDaysCalculator $calculator;

    protected function setUp(): void
    {
        parent::setUp();
        $this->calculator = new WorkDaysCalculator();
    }

    public function testCalculate()
    {
        $startDate = new DateTime('2023-03-06');
        $result = $this->calculator->calculate($startDate, 5);

        $this->assertEquals(5, $result);
    }

    public function testCalculateWithWeekend()
    {
        $startDate = new DateTime('2023-03-06');
        $result = $this->calculator->calculate($startDate, 7);

        $this->assertEquals(5, $result);
    }
}

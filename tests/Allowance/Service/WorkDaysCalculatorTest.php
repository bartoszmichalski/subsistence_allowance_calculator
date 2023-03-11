<?php

namespace Allowance\Service;

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

    /**
     * @dataProvider datesProvider
     */
    public function testCalculate($startDate, $endDate, $expected)
    {
        $result = $this->calculator->calculate(new \DateTime($startDate), new \DateTime($endDate));

        $this->assertEquals($expected, $result);
    }

    protected function datesProvider()
    {
        return [
            ['2023-03-06 21:30:00', '2023-03-07 04:00:00', 0],
            ['2023-03-06 08:30:00', '2023-03-06 11:00:00', 0],
            ['2023-03-06 08:30:00', '2023-03-06 18:00:00', 1],
            ['2023-03-06 8:30:00', '2023-03-10 8:30:00', 5],
            ['2023-03-06 8:30:00', '2023-03-10 21:30:00', 5],
            ['2023-03-06 8:30:00', '2023-03-12 21:30:00', 5],
            ['2023-03-06 21:30:00', '2023-03-13 4:30:00', 4],
            ['2023-03-11 8:30:00', '2023-03-13 9:30:00', 1],
        ];
    }
}

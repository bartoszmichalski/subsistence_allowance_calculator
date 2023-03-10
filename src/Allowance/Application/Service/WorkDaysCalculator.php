<?php

namespace App\Allowance\Application\Service;
class WorkDaysCalculator
{
    public function calculate(\DateTime $startDate, int $days): int
    {
        $workDays = 0;
        $currentDate = $startDate;
        for($i = 0; $i < $days; $i++){
           if ($currentDate->format('N') < 6){
               $workDays++;
           }
           $currentDate = $startDate->modify("+ 1 day");
        }

        return $workDays;
    }
}

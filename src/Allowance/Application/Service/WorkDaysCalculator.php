<?php

namespace App\Allowance\Application\Service;

class WorkDaysCalculator
{
    const MIN_HOURS = 8;

    public function calculate(\DateTime $startDate, \DateTime $endDate): int
    {
        $workDays = 0;
        $currentDate = $startDate;
        $endDateMidnight = new \DateTime($endDate->format('Y-m-d')." 23:59:59");

        if ($startDate->format('Y-m-d') === $endDate->format('Y-m-d')){
            return ($this->isMinHours($startDate, $endDate->format('H:i'))) ? 1: 0;
        }

        while ($currentDate < $endDateMidnight){
           if ($this->isWorkDay($currentDate)){
               $workDays++;
           }
           $currentDate = $startDate->modify("+ 1 day");
        };

        if (!$this->isMinHours($startDate, '23:59:59')) {
            $workDays--;
        }

        if (!$this->isMinHours($endDate, '00:00:00')) {
            $workDays--;
        }

        return ($workDays < 0) ? 0: $workDays;
    }

    private function isMinHours(\DateTime $date, string $hoursString): bool
    {
        $interval = $date->diff(
            new \DateTime($date->format('Y-m-d').$hoursString)
        )->format("%H");

        return !($this->isWorkDay($date) && $interval < self::MIN_HOURS);
    }

    private function isWorkDay(\DateTime $date): bool
    {
        return $date->format('N') < 6;
    }
}

<?php

namespace App\Service;

class AverageService
{
    public function calculateAverage(array $array): float
    {
        $numberOfElements = count($array);
        $sum = array_sum($array);

        return $sum / $numberOfElements;
    }
}
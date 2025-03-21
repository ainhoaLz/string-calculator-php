<?php

namespace Deg540\StringCalculatorPHP;

class StringCalculator
{
    public function Add(string $numbers): int
    {
        if(str_contains($numbers, ',')) {
            return array_sum(explode(',', $numbers));
        }
        if (empty($numbers)) {
            return 0;
        }

        return $numbers;
    }
}
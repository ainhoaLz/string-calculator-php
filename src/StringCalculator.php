<?php

namespace Deg540\StringCalculatorPHP;

use Exception;
use function PHPUnit\Framework\throwException;

class StringCalculator
{
    /**
     * @throws Exception
     */
    public function Add(string $numbers): int
    {
        if (empty($numbers)) {
            return 0;
        }

        if (preg_match_all('/-\d+/', $numbers, $matches)) {
            $negatives = implode(", ", $matches[0]);
            throw new Exception("Negativos no soportados $negatives");
        }

        if(str_starts_with($numbers, '//')) { //numbers = '//;\n1;2'
            $delimiter = substr($numbers, 2, 1); //delimiter = ;

            $numbers = str_replace('//' . $delimiter . '\n','', $numbers); //numbers = '1;2'
            $numbers = str_replace($delimiter, ',', $numbers);//numbers = '1,2'

            return array_sum(explode(',', $numbers));
        }

        $numbers = str_replace('\n', ',', $numbers);

        if(str_contains($numbers, ',')) {
            return array_sum(explode(',', $numbers));
        }

        return $numbers;
    }
}
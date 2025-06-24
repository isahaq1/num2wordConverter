<?php

namespace Isahaq\Num2str;

class Num2Str
{
    public function convert(int $number): string
    {
        return $this->numberToWords($number);
    }

    protected function numberToWords($num): string
    {
        if ($num == 0) return 'zero';

        $dictionary = [
            0 => 'zero', 1 => 'one', 2 => 'two', 3 => 'three', 4 => 'four',
            5 => 'five', 6 => 'six', 7 => 'seven', 8 => 'eight', 9 => 'nine',
            10 => 'ten', 11 => 'eleven', 12 => 'twelve', 13 => 'thirteen',
            14 => 'fourteen', 15 => 'fifteen', 16 => 'sixteen',
            17 => 'seventeen', 18 => 'eighteen', 19 => 'nineteen', 20 => 'twenty',
            30 => 'thirty', 40 => 'forty', 50 => 'fifty',
            60 => 'sixty', 70 => 'seventy', 80 => 'eighty', 90 => 'ninety'
        ];

        $units = [
            1000000000000 => 'trillion',
            1000000000    => 'billion',
            1000000       => 'million',
            1000          => 'thousand',
            100           => 'hundred'
        ];

        if ($num < 0) {
            return 'minus ' . $this->numberToWords(abs($num));
        }

        if ($num < 21) {
            return $dictionary[$num];
        } elseif ($num < 100) {
            $tens = ((int) ($num / 10)) * 10;
            $unitsNum = $num % 10;
            return $dictionary[$tens] . ($unitsNum ? '-' . $dictionary[$unitsNum] : '');
        } elseif ($num < 1000) {
            $hundreds = (int) ($num / 100);
            $remainder = $num % 100;
            return $dictionary[$hundreds] . ' hundred' . ($remainder ? ' ' . $this->numberToWords($remainder) : '');
        } else {
            foreach ($units as $value => $name) {
                if ($num >= $value) {
                    $numUnits = (int) ($num / $value);
                    $remainder = $num % $value;
                    $words = $this->numberToWords($numUnits) . ' ' . $name;
                    if ($remainder) {
                        $words .= ' ' . $this->numberToWords($remainder);
                    }
                    return $words;
                }
            }
        }
    }
}

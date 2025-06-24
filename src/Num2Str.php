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

        $words = '';
        $dictionary = [
            0 => 'zero', 1 => 'one', 2 => 'two', 3 => 'three', 4 => 'four',
            5 => 'five', 6 => 'six', 7 => 'seven', 8 => 'eight', 9 => 'nine',
            10 => 'ten', 11 => 'eleven', 12 => 'twelve', 13 => 'thirteen',
            14 => 'fourteen', 15 => 'fifteen', 16 => 'sixteen',
            17 => 'seventeen', 18 => 'eighteen', 19 => 'nineteen', 20 => 'twenty',
            30 => 'thirty', 40 => 'forty', 50 => 'fifty',
            60 => 'sixty', 70 => 'seventy', 80 => 'eighty', 90 => 'ninety'
        ];

        if ($num < 21) {
            return $dictionary[$num];
        } elseif ($num < 100) {
            $tens = ((int) ($num / 10)) * 10;
            $units = $num % 10;
            return $dictionary[$tens] . ($units ? '-' . $dictionary[$units] : '');
        } elseif ($num < 1000) {
            $hundreds = (int) ($num / 100);
            $remainder = $num % 100;
            return $dictionary[$hundreds] . ' hundred' . ($remainder ? ' ' . $this->numberToWords($remainder) : '');
        } else {
            return (string) $num;
        }
    }
}

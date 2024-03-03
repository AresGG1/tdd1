<?php

declare(strict_types=1);

namespace Taras\Lab1;

use Taras\Lab1\Exceptions\NumberRangeException;

class Converter
{
    private array $romanToArabicMapping = [
        1 => 'I',
        4 => 'IV',
        5 => 'V',
        9 => 'IX',
        10 => 'X',
        40 => 'XL',
        50 => 'L',
        90 => 'XC',
        100 => 'C',
        400 => 'CD',
        500 => 'D',
        900 => 'CM',
        1000 => 'M'
    ];

    /**
     * @throws NumberRangeException
     */
    public function convertArabicToRoman(int $arabicNumber): string
    {
        if ($arabicNumber < 1) {
            throw new NumberRangeException('Number is less than one');
        }

        if ($arabicNumber >= 4000) {
            throw new NumberRangeException('Number exceeds 4000 limit');
        }

        $romanString = '';

        foreach (array_reverse($this->romanToArabicMapping, true) as $key => $value) {

            $romanCharsNumber = (int) floor($arabicNumber / $key);

            if ($romanCharsNumber >= 1) {
                $romanString .= str_repeat($value, $romanCharsNumber);

                $arabicNumber -= $key * $romanCharsNumber;
            }
        }

        return $romanString;
    }
}

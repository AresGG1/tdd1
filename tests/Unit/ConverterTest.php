<?php

namespace Unit;

use PHPUnit\Framework\TestCase;
use Taras\Lab1\Converter;
use Taras\Lab1\Exceptions\NumberRangeException;

class ConverterTest extends TestCase
{
    private Converter $converter;

    public function setUp(): void
    {
        $this->converter = new Converter();
    }

    /*
     *
     * Implement validation
     *
     */

    public function test_less_than_one_throws_exception()
    {
        $this->expectException(NumberRangeException::class);

        $this->converter->convertArabicToRoman(0);
    }

    public function test_more_than_4000_throws_exception(): void
    {
        $this->expectException(NumberRangeException::class);

        $this->converter->convertArabicToRoman(4001);
    }

    public function test_less_than_4000_works(): void
    {
        $result = $this->converter->convertArabicToRoman(3999);

        $this->assertNotNull($result);
    }
    // --------------------

    /*
     *
     * Implement mapping
     *
     */
    public function test_I_returned_on_1(): void
    {
        $result = $this->converter->convertArabicToRoman(1);

        $this->assertEquals('I', $result);
    }
    public function test_X_returned_on_10(): void
    {
        $result = $this->converter->convertArabicToRoman(10);

        $this->assertEquals('X', $result);
    }
    public function test_CD_returned_on_400(): void
    {
        $result = $this->converter->convertArabicToRoman(400);

        $this->assertEquals('CD', $result);
    }
    //-------------------------

    /*
     *
     * Implement multiple chars return
     *
     */
    public function test_II_returned_on_2(): void
    {
        $result = $this->converter->convertArabicToRoman(2);

        $this->assertEquals('II', $result);
    }

    public function test_XI_returned_on_11(): void
    {
        $result = $this->converter->convertArabicToRoman(11);

        $this->assertEquals('XI', $result);
    }

    public function test_DXXXV_returned_on_439(): void
    {
        $result = $this->converter->convertArabicToRoman(439);

        $this->assertEquals('CDXXXIX', $result);
    }

}

<?php

namespace Tests\GJ8486\RomanNumerals;

use Medine\GJ8486\RomanNumerals\RomanNumerals;
use PHPUnit\Framework\TestCase;

class RomanNumeralsTest extends TestCase
{
    /** @test */
    public function itsShouldReturnUnitInRomanNumerals()
    {
        $result = (new RomanNumerals);

        $this->assertEquals(($result)(2), 'II');
        $this->assertEquals(($result)(4), 'IV');
        $this->assertEquals(($result)(7), 'VII');
        $this->assertEquals(($result)(5), 'V');
        $this->assertEquals(($result)(9), 'IX');
    }

    /** @test */
    public function itsShouldReturnDecenasInRomanNumerals()
    {
        $result = (new RomanNumerals);

        $this->assertEquals(($result)(14), 'XIV');
        $this->assertEquals(($result)(21), 'XXI');
        $this->assertEquals(($result)(47), 'XLVII');
        $this->assertEquals(($result)(53), 'LIII');
        $this->assertEquals(($result)(95), 'XCV');
    }

    /** @test */
    public function itsShouldReturnCentenasInRomanNumerals()
    {
        $result = (new RomanNumerals);

        $this->assertEquals(($result)(214), 'CCXIV');
        $this->assertEquals(($result)(421), 'CDXXI');
        $this->assertEquals(($result)(547), 'DXLVII');
        $this->assertEquals(($result)(753), 'DCCLIII');
        $this->assertEquals(($result)(995), 'CMXCV');
    }

    /** @test */
    public function itsShouldReturnNumbersInRomanNumerals()
    {
        $result = (new RomanNumerals);

        $this->assertEquals(($result)(14), 'XIV');
        $this->assertEquals(($result)(2421), 'MMCDXXI');
        $this->assertEquals(($result)(7), 'VII');
        $this->assertEquals(($result)(753), 'DCCLIII');
        $this->assertEquals(($result)(95), 'XCV');
    }
}
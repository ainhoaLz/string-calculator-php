<?php

declare(strict_types=1);

namespace Deg540\StringCalculatorPHP\Test;

use Deg540\StringCalculatorPHP\StringCalculator;
use PHPUnit\Framework\TestCase;

final class StringCalculatorTest extends TestCase
{

    private StringCalculator $stringCalculator;
    protected function setUp(): void
    {
        parent::setUp();

        $this->stringCalculator = new stringCalculator();
    }
    /**
     * @test
     */
    public function givenEmptyStringReturnsZero(): void
    {
        $this->assertEquals(0, $this->stringCalculator->Add(''));

    }
    /**
     * @test
     */
    public function givenAnyNumberReturnsSameNumber(): void
    {
        $this->assertEquals(1, $this->stringCalculator->Add('1'));
    }

    /**
     * @test
     */
    public function givenNumbersSeparatedByCommasReturnsSumOfNumbers(): void
    {
        $this->assertEquals(7, $this->stringCalculator->Add('1,2,3,1'));
    }

    /**
     * @test
     */
    public function givenNumbersSeparatedByCommasAndLineBreakReturnsSumOfNumbers(): void
    {
        $this->assertEquals(6, $this->stringCalculator->Add('1\n2,3'));
    }

    /**
     * @test
     */
    public function givenInvalidStringWithConsecutiveComaAndBreakRowReturnsSumOfNumbers(): void
    {
        $this->assertEquals(1, $this->stringCalculator->Add('1,\n'));
    }

    /**
     * @test
     */
    public function givenStringWithSemicolonDelimiterReturnsSum(): void
    {
        $this->assertEquals(3, $this->stringCalculator->Add('//;\n1;2'));
    }

    /**
     * @test
     */
    public function givenStringWithAmpersandReturnsSum(): void
    {
        $this->assertEquals(3, $this->stringCalculator->Add('//&\n1&2'));
    }

    /**
     * @test
     */
    public function givenOneNegativeNumberThrowsException(): void
    {

        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('Negativos no soportados');

        $this->stringCalculator->Add('-1');

    }

}
<?php
namespace Aerophant\RamdaTest;

use function Aerophant\Ramda\subtract;
use PHPUnit\Framework\TestCase;

class SubtractTest extends TestCase
{
  public function testDivide() {
    $firstValue = 50;
    $secondValue = 10;
    $expectedResult = 40;
    $actualResult = subtract($firstValue)($secondValue);
    $this->assertEquals($expectedResult, $actualResult);
  }
}

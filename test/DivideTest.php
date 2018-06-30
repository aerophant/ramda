<?php
namespace Aerophant\RamdaTest;

use function Aerophant\Ramda\divide;
use PHPUnit\Framework\TestCase;

class DivideTest extends TestCase
{
  public function testDivide()
  {
    $firstValue = 50;
    $secondValue = 10;
    $expectedResult = 5;
    $actualResult = divide($firstValue)($secondValue);
    $this->assertEquals($expectedResult, $actualResult);
  }
}

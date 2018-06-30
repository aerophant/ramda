<?php
namespace Aerophant\RamdaTest;

use function Aerophant\Ramda\multiply;
use PHPUnit\Framework\TestCase;

class MultiplyTest extends TestCase
{
  public function testDivide()
  {
    $firstValue = 50;
    $secondValue = 10;
    $expectedResult = 500;
    $actualResult = multiply($firstValue)($secondValue);
    $this->assertEquals($expectedResult, $actualResult);
  }
}

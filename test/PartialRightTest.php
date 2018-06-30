<?php
namespace Aerophant\RamdaTest;

use function Aerophant\Ramda\divide;
use function Aerophant\Ramda\partialRight;
use PHPUnit\Framework\TestCase;

class PartialRightTest extends TestCase
{
  public function testPartial()
  {
    $double = partialRight(divide(), [2]);
    $arg = 10;
    $expectedResult = 5;
    $actualResult = $double($arg);
    $this->assertEquals($expectedResult, $actualResult);
  }
}

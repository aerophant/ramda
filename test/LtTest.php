<?php
namespace Aerophant\RamdaTest;

use function Aerophant\Ramda\lt;
use PHPUnit\Framework\TestCase;

class LtTest extends TestCase
{
  public function testLtWithFirstArgIsLessThanSecondOne()
  {
    $firstArg = 1;
    $secondArg = 2;
    $actual = lt($firstArg)($secondArg);
    $this->assertTrue($actual);
  }

  public function testLtWithFirstArgIsEqualToSecondOne()
  {
    $firstArg = 2;
    $secondArg = 2;
    $actual = lt($firstArg)($secondArg);
    $this->assertFalse($actual);
  }

  public function testLtWithFirstArgIsGreaterThanSecondOne()
  {
    $firstArg = 3;
    $secondArg = 2;
    $actual = lt($firstArg)($secondArg);
    $this->assertFalse($actual);
  }
}

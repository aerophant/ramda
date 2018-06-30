<?php
namespace Aerophant\RamdaTest;

use function Aerophant\Ramda\gt;
use PHPUnit\Framework\TestCase;

class GtTest extends TestCase
{
  public function testGtWithFirstArgIsLessThanSecondOne()
  {
    $firstArg = 1;
    $secondArg = 2;
    $actual = gt($firstArg)($secondArg);
    $this->assertFalse($actual);
  }

  public function testGtWithFirstArgIsEqualToSecondOne()
  {
    $firstArg = 2;
    $secondArg = 2;
    $actual = gt($firstArg)($secondArg);
    $this->assertFalse($actual);
  }

  public function testGtWithFirstArgIsGreaterThanSecondOne()
  {
    $firstArg = 3;
    $secondArg = 2;
    $actual = gt($firstArg)($secondArg);
    $this->assertTrue($actual);
  }
}

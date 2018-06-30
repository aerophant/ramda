<?php
namespace Aerophant\RamdaTest;

use function Aerophant\Ramda\lte;
use PHPUnit\Framework\TestCase;

class LteTest extends TestCase
{
  public function testLteWithFirstArgIsLessThanSecondOne()
  {
    $firstArg = 1;
    $secondArg = 2;
    $actual = lte($firstArg)($secondArg);
    $this->assertTrue($actual);
  }

  public function testLteWithFirstArgIsEqualToSecondOne()
  {
    $firstArg = 2;
    $secondArg = 2;
    $actual = lte($firstArg)($secondArg);
    $this->assertTrue($actual);
  }

  public function testLteWithFirstArgIsGreaterThanSecondOne()
  {
    $firstArg = 3;
    $secondArg = 2;
    $actual = lte($firstArg)($secondArg);
    $this->assertFalse($actual);
  }
}

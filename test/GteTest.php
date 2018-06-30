<?php
namespace Aerophant\RamdaTest;

use function Aerophant\Ramda\gte;
use PHPUnit\Framework\TestCase;

class GteTest extends TestCase
{
  public function testGteWithFirstArgIsLessThanSecondOne()
  {
    $firstArg = 1;
    $secondArg = 2;
    $actual = gte($firstArg)($secondArg);
    $this->assertFalse($actual);
  }

  public function testGteWithFirstArgIsEqualToSecondOne()
  {
    $firstArg = 2;
    $secondArg = 2;
    $actual = gte($firstArg)($secondArg);
    $this->assertTrue($actual);
  }

  public function testGteWithFirstArgIsGreaterThanSecondOne()
  {
    $firstArg = 3;
    $secondArg = 2;
    $actual = gte($firstArg)($secondArg);
    $this->assertTrue($actual);
  }
}

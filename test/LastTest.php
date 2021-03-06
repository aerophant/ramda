<?php
namespace Aerophant\RamdaTest;

use function Aerophant\Ramda\last;
use PHPUnit\Framework\TestCase;

class LastTest extends TestCase
{
  public function testLast()
  {
    $argument = [1, 2, 3, 4, 5];
    $expect = 5;
    $actual = last()($argument);
    $this->assertEquals($expect, $actual);
  }

  public function testLastWithEmptyArray()
  {
    $argument = [];
    $actual = last()($argument);
    $this->assertNull($actual);
  }
}

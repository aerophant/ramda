<?php

namespace Aerophant\RamdaTest;

use PHPUnit\Framework\TestCase;
use function Aerophant\Ramda\range;

class RangeTest extends TestCase
{
  public function testRangeWithInteger()
  {
    $from = 1;
    $to = 5;
    $expect = [1, 2, 3, 4, 5];
    $actual = range($from)($to);
    $this->assertEquals($expect, $actual);
  }

  public function testRangeWithFloat()
  {
    $from = 0.1;
    $to = 5;
    $expect = [0.1, 1.1, 2.1, 3.1, 4.1];
    $actual = range($from)($to);
    $this->assertEquals($expect, $actual);
  }
}

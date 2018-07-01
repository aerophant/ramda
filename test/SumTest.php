<?php

namespace Aerophant\RamdaTest;

use function Aerophant\Ramda\sum;
use PHPUnit\Framework\TestCase;

class SumTest extends TestCase
{
  public function testSum()
  {
    $expect = 121;
    $actual = sum()([2,4,6,8,100,1]);
    $this->assertEquals($expect, $actual);
  }
}

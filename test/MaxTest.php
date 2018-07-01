<?php

namespace Aerophant\RamdaTest;

use PHPUnit\Framework\TestCase;
use function Aerophant\Ramda\max;

class MaxTest extends TestCase
{
  public function testMax()
  {
    $firstValue = 100;
    $secondValue = 200;
    $expect = 200;
    $actual = max($firstValue)($secondValue);
    $this->assertEquals($expect, $actual);
  }
}

<?php

namespace Aerophant\RamdaTest;

use function Aerophant\Ramda\min;
use PHPUnit\Framework\TestCase;

class MinTest extends TestCase
{
  public function testMin()
  {
    $firstValue = 9;
    $secondValue = 3;
    $expect = 3;
    $actual = min(9)(3);
    $this->assertEquals($expect, $actual);
  }
}

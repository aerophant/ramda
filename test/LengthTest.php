<?php

namespace Aerophant\RamdaTest;

use function Aerophant\Ramda\length;
use PHPUnit\Framework\TestCase;

class LengthTest extends TestCase
{
  public function testLength()
  {
    $array = [1, 2, 3, 4, 5];
    $expect = 5;
    $actual = length()($array);
    $this->assertEquals($expect, $actual);
  }
}

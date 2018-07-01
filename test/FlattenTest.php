<?php

namespace Aerophant\RamdaTest;

use function Aerophant\Ramda\flatten;
use PHPUnit\Framework\TestCase;

class FlattenTest extends TestCase
{
  public function testFlatten()
  {
    $array = [1, 2, [3, 4], [[5, 6, 7], [8, 9], 10]];
    $expect = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
    $actual = flatten()($array);
    $this->assertEquals($expect, $actual);
  }
}

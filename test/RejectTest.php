<?php

namespace Aerophant\RamdaTest;

use function Aerophant\Ramda\reject;
use PHPUnit\Framework\TestCase;

class RejectTest extends TestCase
{
  public function testWithIsOdd()
  {
    $isOdd = function ($item) {
      return $item % 2 == 1;
    };

    $array = [1, 2, 3, 4];
    $expect = [2, 4];
    $actual = reject($isOdd)($array);
    $this->assertEquals($expect, $actual);
  }
}

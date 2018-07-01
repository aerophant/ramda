<?php

namespace Aerophant\RamdaTest;

use function Aerophant\Ramda\reject;
use function Aerophant\Ramda\rejectPreserveKey;
use PHPUnit\Framework\TestCase;

class RejectPreserveKeyTest extends TestCase
{
  public function testWithIsOdd()
  {
    $isOdd = function ($item) {
      return $item % 2 == 1;
    };

    $array = [1, 2, 3, 4];
    $expect = [1 => 2, 3 => 4];
    $actual = rejectPreserveKey($isOdd)($array);
    $this->assertEquals($expect, $actual);
  }
}

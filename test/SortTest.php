<?php

namespace Aerophant\RamdaTest;

use PHPUnit\Framework\TestCase;
use function Aerophant\Ramda\sort;

class SortTest extends TestCase
{
  public function testSort()
  {
    $diff = function ($a, $b) {
      return $a - $b;
    };
    $array = [4,2,7,5];
    $expect = [2, 4, 5, 7];
    $actual = sort($diff)($array);
    $this->assertEquals($expect, $actual);
  }
}

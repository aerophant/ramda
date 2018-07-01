<?php

namespace Aerophant\RamdaTest;

use function Aerophant\Ramda\remove;
use PHPUnit\Framework\TestCase;

class RemoveTest extends TestCase
{
  public function testRemove()
  {
    $array = [1, 2, 3, 4, 5, 6, 7, 8];
    $start = 2;
    $count = 3;
    $expect = [1, 2, 6, 7, 8];
    $actual = remove($start)($count)($array);
    $this->assertEquals($expect, $actual);
  }
}

<?php

namespace Aerophant\RamdaTest;

use function Aerophant\Ramda\join;
use PHPUnit\Framework\TestCase;

class JoinTest extends TestCase
{
  public function testJoinWithComma()
  {
    $array = [1, 2, 3];
    $expect = '1,2,3';
    $actual = join(',')($array);
    $this->assertEquals($expect, $actual);
  }
}

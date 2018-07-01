<?php

namespace Aerophant\RamdaTest;

use function Aerophant\Ramda\split;
use PHPUnit\Framework\TestCase;

class SplitTest extends TestCase
{
  public function testSplit()
  {
    $string = '.a.b.c';
    $expect = ['', 'a', 'b', 'c'];
    $actual = split('.')($string);
    $this->assertEquals($expect, $actual);
  }
}

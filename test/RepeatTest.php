<?php

namespace Aerophant\RamdaTest;

use function Aerophant\Ramda\repeat;
use PHPUnit\Framework\TestCase;

class RepeatTest extends TestCase
{
  public function testRepeat()
  {
    $item = 'hi';
    $count = 5;
    $expect = ['hi', 'hi', 'hi', 'hi', 'hi'];
    $actual = repeat($item)($count);
    $this->assertEquals($expect, $actual);
  }
}

<?php

namespace Aerophant\RamdaTest;

use function Aerophant\Ramda\pair;
use PHPUnit\Framework\TestCase;

class PairTest extends TestCase
{
  public function testPair()
  {
    $firstValue = 'foo';
    $secondValue = 'bar';
    $expect = ['foo', 'bar'];
    $actual = pair($firstValue)($secondValue);
    $this->assertEquals($expect, $actual);
  }
}

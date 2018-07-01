<?php

namespace Aerophant\RamdaTest;

use function Aerophant\Ramda\median;
use PHPUnit\Framework\TestCase;

class MedianTest extends TestCase
{
  public function testMedianWithOddNumberOfArguments()
  {
    $numbers = [2, 9, 7];
    $expect = 7;
    $actual = median()($numbers);
    $this->assertEquals($expect, $actual);
  }

  public function testMedianWithEvenNumberOfArguments()
  {
    $numbers = [7, 2, 10, 9];
    $expect = 8;
    $actual = median()($numbers);
    $this->assertEquals($expect, $actual);
  }
}

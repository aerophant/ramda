<?php

namespace Aerophant\RamdaTest;

use function Aerophant\Ramda\mean;
use PHPUnit\Framework\TestCase;

class MeanTest extends TestCase
{
  public function testMean()
  {
    $numbers = [2, 7, 9];
    $expect = 6;
    $actual = mean()($numbers);
    $this->assertEquals($expect, $actual);
  }

  public function testMeanWithEmptyArray()
  {
    $this->expectException(\InvalidArgumentException::class);
    $numbers = [];
    mean()($numbers);
  }
}

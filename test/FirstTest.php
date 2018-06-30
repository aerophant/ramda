<?php
namespace Aerophant\RamdaTest;

use function Aerophant\Ramda\first;
use PHPUnit\Framework\TestCase;

class FirstTest extends TestCase
{
  public function testFirst()
  {
    $argument = [1, 2, 3, 4, 5];
    $expect = 1;
    $actual = first()($argument);
    $this->assertEquals($expect, $actual);
  }

  public function testFirstWithEmptyArray()
  {
    $argument = [];
    $actual = first()($argument);
    $this->assertNull($actual);
  }
}

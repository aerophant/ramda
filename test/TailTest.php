<?php
namespace Aerophant\RamdaTest;

use function Aerophant\Ramda\tail;
use PHPUnit\Framework\TestCase;

class TailTest extends TestCase
{
  public function testTail()
  {
    $argument = [1, 2, 3, 4, 5];
    $expect = 5;
    $actual = tail()($argument);
    $this->assertEquals($expect, $actual);
  }

  public function testTailWithEmptyArray()
  {
    $argument = [];
    $actual = tail()($argument);
    $this->assertNull($actual);
  }
}

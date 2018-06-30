<?php
namespace Aerophant\RamdaTest;

use function Aerophant\Ramda\head;
use PHPUnit\Framework\TestCase;

class HeadTest extends TestCase
{
  public function testHead()
  {
    $argument = [1, 2, 3, 4, 5];
    $expect = 1;
    $actual = head()($argument);
    $this->assertEquals($expect, $actual);
  }

  public function testHeadWithEmptyArray()
  {
    $argument = [];
    $actual = head()($argument);
    $this->assertNull($actual);
  }
}

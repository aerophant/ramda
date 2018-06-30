<?php
namespace Aerophant\RamdaTest;

use function Aerophant\Ramda\inc;
use PHPUnit\Framework\TestCase;

class IncTest extends TestCase
{
  public function testInc()
  {
    $value = 10;
    $expect = 11;
    $actual = inc()(10);
    $this->assertEquals($expect, $actual);
  }
}

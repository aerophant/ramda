<?php

namespace Aerophant\RamdaTest;

use function Aerophant\Ramda\toLower;
use PHPUnit\Framework\TestCase;

class ToLowerTest extends TestCase
{
  public function testToLower()
  {
    $expect = 'abc';
    $actual = toLower()('ABC');
    $this->assertEquals($expect, $actual);
  }
}

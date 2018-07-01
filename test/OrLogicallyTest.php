<?php

namespace Aerophant\RamdaTest;

use function Aerophant\Ramda\orLogically;
use PHPUnit\Framework\TestCase;

class OrLogicallyTest extends TestCase
{
  public function testOrLogicallyWithTrueAndFalse()
  {
    $actual = orLogically(true)(false);
    $this->assertTrue($actual);
  }

  public function testOrLogicallyWithFalseAndFalse()
  {
    $actual = orLogically(false)(false);
    $this->assertFalse($actual);
  }
}

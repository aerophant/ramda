<?php
namespace Aerophant\RamdaTest;

use function Aerophant\Ramda\andLogically;
use PHPUnit\Framework\TestCase;

class AndLogicallyTest extends TestCase
{
  public function testAndLogicallyWithTrueAndTrue()
  {
    $actual = andLogically(true)(true);
    $this->assertTrue($actual);
  }

  public function testAndLogicallyWithTrueAndFalse()
  {
    $actual = andLogically(true)(false);
    $this->assertFalse($actual);
  }
}

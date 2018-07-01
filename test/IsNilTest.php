<?php

namespace Aerophant\RamdaTest;

use function Aerophant\Ramda\isNil;
use PHPUnit\Framework\TestCase;

class IsNilTest extends TestCase
{
  public function testIsNilWithNull()
  {
    $actual = isNil()(null);
    $this->assertTrue($actual);
  }
  public function testIsNilWithEmptyArray()
  {
    $actual = isNil()([]);
    $this->assertFalse($actual);
  }
  public function testIsNilWithEmptyStdClassObject()
  {
    $actual = isNil()(new \stdClass());
    $this->assertFalse($actual);
  }
}

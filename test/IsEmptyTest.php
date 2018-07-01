<?php

namespace Aerophant\RamdaTest;

use function Aerophant\Ramda\isEmpty;
use PHPUnit\Framework\TestCase;

class IsEmptyTest extends TestCase
{
  public function testIsEmptyWithNull()
  {
    $actual = isEmpty()(null);
    $this->assertTrue($actual);
  }
  public function testIsEmptyWithEmptyArray()
  {
    $actual = isEmpty()([]);
    $this->assertTrue($actual);
  }
  public function testIsEmptyWithNonEmptyArray()
  {
    $actual = isEmpty()([1, 2, 3]);
    $this->assertFalse($actual);
  }
  public function testIsEmptyWithStdClass()
  {
    $actual = isEmpty()(new \stdClass());
    $this->assertFalse($actual);
  }
}

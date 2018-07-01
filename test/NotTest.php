<?php

namespace Aerophant\RamdaTest;

use function Aerophant\Ramda\not;
use PHPUnit\Framework\TestCase;

class NotTest extends TestCase
{
  public function testNotTrue()
  {
    $value = true;
    $actual = not()($value);
    $this->assertFalse($actual);
  }

  public function testNotFalse()
  {
    $value = false;
    $actual = not()($value);
    $this->assertTrue($actual);
  }

  public function testNotNull()
  {
    $value = null;
    $actual = not()($value);
    $this->assertTrue($actual);
  }

  public function testNotEmptyString()
  {
    $value = '';
    $actual = not()($value);
    $this->assertTrue($actual);
  }

  public function testNotObject()
  {
    $value = new \stdClass();
    $actual = not()($value);
    $this->assertFalse($actual);
  }
}

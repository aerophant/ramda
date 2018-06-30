<?php
namespace Aerophant\RamdaTest;

use function Aerophant\Ramda\defaultTo;
use PHPUnit\Framework\TestCase;

class DefaultToTest extends TestCase
{
  public function testDefaultToAndGetDefaultValue()
  {
    $value = null;
    $defaultValue = 10;
    $actual = defaultTo($defaultValue)($value);
    $this->assertEquals($defaultValue, $actual);
  }

  public function testDefaultToAndGetInputValue()
  {
    $value = 50;
    $defaultValue = 10;
    $actual = defaultTo($defaultValue)($value);
    $this->assertEquals($value, $actual);
  }
}

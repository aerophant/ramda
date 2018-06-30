<?php
namespace Aerophant\RamdaTest;

use function Aerophant\Ramda\ifElse;
use PHPUnit\Framework\TestCase;

class IfElseTest extends TestCase
{
  public function testIfElseOnTrueCondition()
  {
    $value = 10;
    $isEven = function ($it) {
      return $it % 2 === 0;
    };
    $powerTwo = function ($it) {
      return $it * $it;
    };
    $powerThree = function ($it) {
      return $it * $it * $it;
    };
    $expect = 100;
    $actual = ifElse($isEven)($powerTwo)($powerThree)($value);
    $this->assertEquals($expect, $actual);
  }

  public function testIfElseOnFalseCondition()
  {
    $value = 10;
    $isOdd = function ($it) {
      return $it % 2 !== 0;
    };
    $powerTwo = function ($it) {
      return $it * $it;
    };
    $powerThree = function ($it) {
      return $it * $it * $it;
    };
    $expect = 1000;
    $actual = ifElse($isOdd)($powerTwo)($powerThree)($value);
    $this->assertEquals($expect, $actual);
  }
}

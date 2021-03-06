<?php
namespace Aerophant\RamdaTest;

use function Aerophant\Ramda\any;
use PHPUnit\Framework\TestCase;

class AnyTest extends TestCase
{

  public function testAnyAndExpectTrue()
  {
    $lessThan2 = function ($it) {
      return $it < 2;
    };
    $this->assertTrue(any($lessThan2)([1, 2, 3, 4]));
  }

  public function testAnyAndExpectFalse()
  {
    $lessThan2 = function ($it) {
      return $it < 2;
    };
    $this->assertFalse(any($lessThan2)([3, 4, 5, 6]));
  }

  public function testAnyWithEmptyArray()
  {
    $predicate = function ($it) {
      return true;
    };
    $this->assertFalse(any($predicate)([]));
  }
}

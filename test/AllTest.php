<?php
namespace Aerophant\RamdaTest;

use function Aerophant\Ramda\all;
use PHPUnit\Framework\TestCase;

class AllTest extends TestCase
{
  public function testAllAndExpectTrue() {
    $lessThan10 = function ($it) {
      return $it < 10;
    };
    $this->assertTrue(all($lessThan10)([1, 2, 3, 4]));
  }

  public function testAllAndExpectFalse() {
    $lessThan10 = function ($it) {
      return $it < 10;
    };
    $this->assertFalse(all($lessThan10)([1, 2, 3, 4, 20]));
  }

  public function testAllWithEmptyArray() {
    $predicate = function ($it) {
      return true;
    };
    $this->assertFalse(all($predicate)([]));
  }
}

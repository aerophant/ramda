<?php
namespace Aerophant\RamdaTest;

use function Aerophant\Ramda\reduce;
use PHPUnit\Framework\TestCase;

class ReduceTest extends TestCase
{
  public function testReduce()
  {
    $add = function ($a, $b) {
      return $a + $b;
    };
    $this->assertEquals(15, reduce($add)(0)([1,2,3,4,5]));
  }
}

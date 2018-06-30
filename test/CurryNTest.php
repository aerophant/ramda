<?php
namespace Aerophant\RamdaTest;

use function Aerophant\Ramda\curryN;
use PHPUnit\Framework\TestCase;

class CurryNTest extends TestCase
{

  public function testCurryNWithInvokeFunctionDirectly()
  {
    $curriedReduce = curryN('array_reduce', 3);
    $add = function ($a, $b) {
      return $a + $b;
    };
    $result = $curriedReduce([4,5,6], $add, 0);
    $this->assertEquals(15, $result);
  }

  public function testCurryNWithAutoCurry()
  {
    $curriedReduce = curryN('array_reduce', 3);
    $add = function ($a, $b) {
      return $a + $b;
    };
    $result = $curriedReduce([4,5,6])($add)(0);
    $this->assertEquals(15, $result);
  }
}

<?php
namespace Aerophant\RamdaTest;

use function Aerophant\Ramda\find;
use PHPUnit\Framework\TestCase;

class FindTest extends TestCase
{
  public function testFindWithExistingValue()
  {
    $isEqual3 = function ($it) {
      return 3 == $it;
    };
    $list = [1, 2, 3, 4, 5];
    $expect = 3;
    $actual = find($isEqual3)($list);
    $this->assertEquals($expect, $actual);
  }

  public function testFindWithNonExistingValue()
  {
    $isEqual11 = function ($it) {
      return 11 == $it;
    };
    $list = [1, 2, 3, 4, 5];
    $actual = find($isEqual11)($list);
    $this->assertNull($actual);
  }
}

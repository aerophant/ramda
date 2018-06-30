<?php
namespace Aerophant\RamdaTest;

use function Aerophant\Ramda\filterPreserveKey;
use PHPUnit\Framework\TestCase;

class FilterPreserveKeyTest extends TestCase
{
  public function testFilter()
  {
    $isEven = function ($it) {
      return $it % 2 == 0;
    };
    $this->assertEquals([1 => 2, 3 => 4, 5 => 6], filterPreserveKey($isEven)([1,2,3,4,5,6]));
  }
}

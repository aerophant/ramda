<?php
namespace Aerophant\RamdaTest;

use function Aerophant\Ramda\filter;
use PHPUnit\Framework\TestCase;

class FilterTest extends TestCase
{
  public function testFilter()
  {
    $isEven = function ($it) {
      return $it % 2 == 0;
    };
    $this->assertEquals([2,4,6], filter($isEven)([1,2,3,4,5,6]));
  }
}

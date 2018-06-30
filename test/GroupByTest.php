<?php
namespace Aerophant\RamdaTest;

use function Aerophant\Ramda\groupBy;
use PHPUnit\Framework\TestCase;

class GroupByTest extends TestCase
{
  public function testGroupByIsEven()
  {
    $isEven = function ($value) {
      return $value % 2 === 0;
    };
    $expected = [
      true => [2, 4, 6],
      false => [1, 3, 5]
    ];
    $actual = groupBy($isEven)([1, 2, 3, 4, 5, 6]);
    $this->assertEquals($expected, $actual);
  }
}

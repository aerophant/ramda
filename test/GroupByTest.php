<?php
namespace Aerophant\RamdaTest;

use function Aerophant\Ramda\groupBy;
use PHPUnit\Framework\TestCase;

class GroupByTest extends TestCase
{
  public function testGroupByIsEven()
  {
    $evenOrOdd = function ($value) {
      return $value % 2 === 0 ? 'even' : 'odd';
    };
    $expected = [
      'even' => [2, 4, 6],
      'odd' => [1, 3, 5]
    ];
    $actual = groupBy($evenOrOdd)([1, 2, 3, 4, 5, 6]);
    $this->assertEquals($expected, $actual);
  }
}

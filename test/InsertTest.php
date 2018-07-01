<?php

namespace Aerophant\RamdaTest;

use function Aerophant\Ramda\insert;
use PHPUnit\Framework\TestCase;

class InsertTest extends TestCase
{

  public function testInsertFirst()
  {
    $array = [1, 2, 3, 4, 5];
    $expected = ['newItem', 1, 2, 3, 4, 5];
    $actual = insert(0)('newItem')($array);
    $this->assertEquals($expected, $actual);
  }

  public function testInsertLast()
  {
    $array = [1, 2, 3, 4, 5];
    $expected = [1, 2, 3, 4, 5, 'newItem'];
    $actual = insert(5)('newItem')($array);
    $this->assertEquals($expected, $actual);
  }

  public function testInsertNth()
  {
    $array = [1, 2, 3, 4, 5];
    $expected = [1, 2,  'newItem', 3, 4, 5];
    $actual = insert(2)('newItem')($array);
    $this->assertEquals($expected, $actual);
  }
}

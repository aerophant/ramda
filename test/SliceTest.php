<?php

namespace Aerophant\RamdaTest;

use function Aerophant\Ramda\slice;
use PHPUnit\Framework\TestCase;

class SliceTest extends TestCase
{
  public function testSliceOnArray()
  {
    $fromIndex = 1;
    $toIndex = 3;
    $list = ['a', 'b', 'c', 'd', 'e'];
    $expect = ['b', 'c'];
    $actual = slice($fromIndex)($toIndex)($list);
    $this->assertEquals($expect, $actual);
  }

  public function testSliceOnArrayWithToIndexIsLargerThanArraySize()
  {
    $fromIndex = 1;
    $toIndex = 300;
    $list = ['a', 'b', 'c', 'd'];
    $expect = ['b', 'c', 'd'];
    $actual = slice($fromIndex)($toIndex)($list);
    $this->assertEquals($expect, $actual);
  }
  public function testSliceOnArrayWithNegativeToIndex()
  {
    $fromIndex = 0;
    $toIndex = -1;
    $list = ['a', 'b', 'c', 'd'];
    $expect = ['a', 'b', 'c'];
    $actual = slice($fromIndex)($toIndex)($list);
    $this->assertEquals($expect, $actual);
  }
  public function testSliceOnArrayWithNegativeIndex()
  {
    $fromIndex = -3;
    $toIndex = -1;
    $list = ['a', 'b', 'c', 'd'];
    $expect = ['b', 'c'];
    $actual = slice($fromIndex)($toIndex)($list);
    $this->assertEquals($expect, $actual);
  }

  public function testSliceOnString()
  {
    $fromIndex = 1;
    $toIndex = 3;
    $list = 'abcde';
    $expect = 'bc';
    $actual = slice($fromIndex)($toIndex)($list);
    $this->assertEquals($expect, $actual);
  }

  public function testSliceOnStringWithToIndexIsLargerThanArraySize()
  {
    $fromIndex = 1;
    $toIndex = 300;
    $list = 'abcd';
    $expect = 'bcd';
    $actual = slice($fromIndex)($toIndex)($list);
    $this->assertEquals($expect, $actual);
  }
  public function testSliceOnStringWithNegativeToIndex()
  {
    $fromIndex = 0;
    $toIndex = -1;
    $list = 'abcd';
    $expect = 'abc';
    $actual = slice($fromIndex)($toIndex)($list);
    $this->assertEquals($expect, $actual);
  }
  public function testSliceOnStringWithNegativeIndex()
  {
    $fromIndex = -3;
    $toIndex = -1;
    $list = 'abcd';
    $expect = 'bc';
    $actual = slice($fromIndex)($toIndex)($list);
    $this->assertEquals($expect, $actual);
  }
}

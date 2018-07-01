<?php

namespace Aerophant\RamdaTest;

use function Aerophant\Ramda\reverse;
use PHPUnit\Framework\TestCase;

class ReverseTest extends TestCase
{
  public function testReverseArray()
  {
    $list = [1, 2, 3];
    $expect = [3, 2, 1];
    $actual = reverse()($list);
    $this->assertEquals($expect, $actual);
  }

  public function testReverseEmptyArray()
  {
    $list = [];
    $expect = [];
    $actual = reverse()($list);
    $this->assertEquals($expect, $actual);
  }

  public function testReverseString()
  {
    $list = 'abc';
    $expect = 'cba';
    $actual = reverse()($list);
    $this->assertEquals($expect, $actual);
  }
  public function testReverseEmptyString()
  {
    $list = '';
    $expect = '';
    $actual = reverse()($list);
    $this->assertEquals($expect, $actual);
  }

  public function testReverseUnsupportedType()
  {
    $this->expectException(\InvalidArgumentException::class);
    reverse()(100);
  }
}

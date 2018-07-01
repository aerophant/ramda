<?php
namespace Aerophant\RamdaTest;

use function Aerophant\Ramda\startsWith;
use PHPUnit\Framework\TestCase;

class StartsWithTest extends TestCase
{
  public function testStartsWithValidString()
  {
    $prefix = 'SomeKeyword';
    $list = 'SomeKeywordArePrefix';
    $actual = startsWith($prefix)($list);
    $this->assertTrue($actual);
  }

  public function testStartsWithInvalidString()
  {
    $prefix = 'AnotherKeyword';
    $list = 'SomeKeywordArePrefix';
    $actual = startsWith($prefix)($list);
    $this->assertFalse($actual);
  }

  public function testStartsWithEmptyString()
  {
    $prefix = '';
    $list = 'SomeKeywordArePrefix';
    $actual = startsWith($prefix)($list);
    $this->assertTrue($actual);
  }

  public function testWithUnsupportedArguments()
  {
    $this->expectException(\InvalidArgumentException::class);
    startsWith(1)('111');
  }

  public function testStartsWithEmptyArray()
  {
    $prefix = [];
    $list = [1, 2 ,3, 4];
    $actual = startsWith($prefix)($list);
    $this->assertTrue($actual);
  }
  public function testStartsWithValidArray()
  {
    $prefix = [1];
    $list = [1, 2 ,3, 4];
    $actual = startsWith($prefix)($list);
    $this->assertTrue($actual);
  }
  public function testStartsWithInvalidArray()
  {
    $prefix = [5];
    $list = [1, 2 ,3, 4];
    $actual = startsWith($prefix)($list);
    $this->assertFalse($actual);
  }
}

<?php
namespace Aerophant\RamdaTest;

use function Aerophant\Ramda\endsWith;
use PHPUnit\Framework\TestCase;

class EndsWithTest extends TestCase
{
  public function testEndsWithValidString()
  {
    $suffix = 'SomeKeyword';
    $list = 'StringWhichEndsWithSomeKeyword';
    $actual = endsWith($suffix)($list);
    $this->assertTrue($actual);
  }

  public function testEndsWithInvalidString()
  {
    $suffix = 'AnotherKeyword';
    $list = 'StringWhichEndsWithSomeKeyword';
    $actual = endsWith($suffix)($list);
    $this->assertFalse($actual);
  }

  public function testEndsWithEmptyString()
  {
    $suffix = '';
    $list = 'StringWhichEndsWithSomeKeyword';
    $actual = endsWith($suffix)($list);
    $this->assertTrue($actual);
  }

  public function testWithUnsupportedArguments()
  {
    $this->expectException(\InvalidArgumentException::class);
    endsWith(1)('111');
  }

  public function testEndsWithEmptyArray()
  {
    $suffix = [];
    $list = [1, 2 ,3, 4];
    $actual = endsWith($suffix)($list);
    $this->assertTrue($actual);
  }
  public function testEndsWithValidArray()
  {
    $suffix = [4];
    $list = [1, 2 ,3, 4];
    $actual = endsWith($suffix)($list);
    $this->assertTrue($actual);
  }
  public function testEndsWithInvalidArray()
  {
    $suffix = [5];
    $list = [1, 2 ,3, 4];
    $actual = endsWith($suffix)($list);
    $this->assertFalse($actual);
  }
}

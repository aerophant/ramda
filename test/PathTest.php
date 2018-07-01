<?php

namespace Aerophant\RamdaTest;

use function Aerophant\Ramda\path;
use PHPUnit\Framework\TestCase;

class PathTest extends TestCase
{
  public function testSimplePath()
  {
    $paths = ['data'];
    $object = ['data' => 'dataValue'];
    $expect = 'dataValue';
    $actual = path($paths)($object);
    $this->assertEquals($expect, $actual);
  }
  public function testNestedPath()
  {
    $paths = ['data', 'nestedData'];
    $object = ['data' => ['nestedData' => 'dataValue']];
    $expect = 'dataValue';
    $actual = path($paths)($object);
    $this->assertEquals($expect, $actual);
  }
  public function testSimplePathAndNotFound()
  {
    $paths = ['data'];
    $object = ['anotherData' => 'dataValue'];
    $actual = path($paths)($object);
    $this->assertNull($actual);
  }
  public function testNestedPathAndNotFound()
  {
    $paths = ['data', 'nestedData'];
    $object = ['data' => ['anotherNestedData' => 'dataValue']];
    $actual = path($paths)($object);
    $this->assertNull($actual);
  }
  public function testUnsupportedObject()
  {
    $this->expectException(\InvalidArgumentException::class);
    $paths = ['data', 'nestedData'];
    $object = new \stdClass();
    path($paths)($object);
  }
}

<?php

namespace Aerophant\RamdaTest;

use function Aerophant\Ramda\path;
use function Aerophant\Ramda\pathOr;
use PHPUnit\Framework\TestCase;

class PathOrTest extends TestCase
{
  public function testSimplePath()
  {
    $paths = ['data'];
    $object = ['data' => 'dataValue'];
    $defaultValue = 'defaultValue';
    $expect = 'dataValue';
    $actual = pathOr($defaultValue)($paths)($object);
    $this->assertEquals($expect, $actual);
  }
  public function testNestedPath()
  {
    $paths = ['data', 'nestedData'];
    $object = ['data' => ['nestedData' => 'dataValue']];
    $defaultValue = 'defaultValue';
    $expect = 'dataValue';
    $actual = pathOr($defaultValue)($paths)($object);
    $this->assertEquals($expect, $actual);
  }
  public function testSimplePathAndNotFound()
  {
    $paths = ['data'];
    $object = ['anotherData' => 'dataValue'];
    $defaultValue = 'defaultValue';
    $actual = pathOr($defaultValue)($paths)($object);
    $this->assertEquals($defaultValue, $actual);
  }
  public function testNestedPathAndNotFound()
  {
    $paths = ['data', 'nestedData'];
    $object = ['data' => ['anotherNestedData' => 'dataValue']];
    $defaultValue = 'defaultValue';
    $actual = pathOr($defaultValue)($paths)($object);
    $this->assertEquals($defaultValue, $actual);
  }
  public function testUnsupportedObject()
  {
    $this->expectException(\InvalidArgumentException::class);
    $paths = ['data', 'nestedData'];
    $object = new \stdClass();
    $defaultValue = 'defaultValue';
    pathOr($defaultValue)($paths)($object);
  }
}

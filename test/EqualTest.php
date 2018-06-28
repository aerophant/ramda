<?php
namespace Aerophant\RamdaTest;

use function Aerophant\Ramda\equals;
use Aerophant\RamdaTest\Asset\PlainObjectAsset;
use PHPUnit\Framework\TestCase;

class EqualTest extends TestCase
{
  public function testEqualsWithPrimitiveValueAndExpectTrue() {
    $this->assertTrue(equals(1)(1));
    $this->assertTrue(equals('someString')('someString'));
  }
  public function testEqualsWithPrimitiveValueAndExpectFalse() {
    $this->assertFalse(equals(1)(2));
    $this->assertFalse(equals('someString')('anotherString'));
  }
  public function testEqualsWithObjectAndExpectTrue(){
    $obj1 = new PlainObjectAsset();
    $obj1->setData('data');
    $obj2 = new PlainObjectAsset();
    $obj2->setData('data');
    $this->assertTrue(equals($obj1)($obj2));
  }
  public function testEqualsWithObjectAndExpectFalse(){
    $obj1 = new PlainObjectAsset();
    $obj1->setData('data');
    $obj2 = new PlainObjectAsset();
    $obj2->setData('anotherData');
    $this->assertFalse(equals($obj1)($obj2));
  }
}

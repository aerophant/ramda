<?php
namespace Aerophant\RamdaTest;

use function Aerophant\Ramda\factory;
use Aerophant\RamdaTest\Asset\PlainObjectAsset;
use PHPUnit\Framework\TestCase;

class FactoryTest extends TestCase
{

  public function testFactoryMustReturnCorrectObjectType()
  {
    $factory = factory(PlainObjectAsset::class);
    $obj = $factory();
    $this->assertInstanceOf(PlainObjectAsset::class, $obj);
  }

  public function testFactoryMustAlwaysReturnNewObject()
  {
    $factory = factory(PlainObjectAsset::class);
    $obj1 = $factory();
    $obj2 = $factory();
    $this->assertNotSame($obj1, $obj2);
  }
}

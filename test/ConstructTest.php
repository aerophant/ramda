<?php
namespace Aerophant\RamdaTest;

use function Aerophant\Ramda\construct;
use Aerophant\RamdaTest\Asset\PlainObjectAsset;
use PHPUnit\Framework\TestCase;

class ConstructTest extends TestCase
{

  public function testFactoryMustReturnCorrectObjectType()
  {
    $construct = construct()(PlainObjectAsset::class);
    $obj = $construct();
    $this->assertInstanceOf(PlainObjectAsset::class, $obj);
  }

  public function testFactoryMustAlwaysReturnNewObject()
  {
    $construct = construct()(PlainObjectAsset::class);
    $obj1 = $construct();
    $obj2 = $construct();
    $this->assertNotSame($obj1, $obj2);
  }
}

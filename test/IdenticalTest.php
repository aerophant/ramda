<?php
namespace Aerophant\RamdaTest;

use function Aerophant\Ramda\identical;
use Aerophant\RamdaTest\Asset\PlainObjectAsset;
use PHPUnit\Framework\TestCase;

class IdenticalTest extends TestCase
{

  public function testIdenticalWithSameObject()
  {
    $firstValue = new PlainObjectAsset();
    $secondValue = $firstValue;
    $actual = identical($firstValue)($secondValue);
    $this->assertTrue($actual);
  }

  public function testIdenticalWithDifferenceObject()
  {
    $firstValue = new PlainObjectAsset();
    $secondValue = new PlainObjectAsset();
    $actual = identical($firstValue)($secondValue);
    $this->assertFalse($actual);
  }

  public function testIdenticalWithSamePrimitiveValue()
  {
    $firstValue = '1';
    $secondValue = '1';
    $actual = identical($firstValue)($secondValue);
    $this->assertTrue($actual);
  }

  public function testIdenticalWithDifferencePrimitiveValue()
  {
    $firstValue = '11';
    $secondValue = '22';
    $actual = identical($firstValue)($secondValue);
    $this->assertFalse($actual);
  }
}

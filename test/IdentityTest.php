<?php
namespace Aerophant\RamdaTest;

use function Aerophant\Ramda\identity;
use Aerophant\RamdaTest\Asset\PlainObjectAsset;
use PHPUnit\Framework\TestCase;

class IdentityTest extends TestCase
{
  public function testIdentity()
  {
    $value = new PlainObjectAsset();
    $actual = identity()($value);
    $this->assertSame($value, $actual);
  }
}

<?php

namespace Aerophant\RamdaTest;

use function Aerophant\Ramda\construct;
use function Aerophant\Ramda\memoize;
use Aerophant\RamdaTest\Asset\PlainObjectAsset;
use PHPUnit\Framework\TestCase;

class MemorizeTest extends TestCase
{
  public function testMemorizeWithConsruct()
  {
    $constructor = construct(PlainObjectAsset::class);
    $memorizedConstructor = memoize()($constructor);
    $expect = $memorizedConstructor();
    $actual = $memorizedConstructor();
    $this->assertSame($expect, $actual);
  }
}

<?php
namespace Aerophant\RamdaTest;

use function Aerophant\Ramda\always;
use Aerophant\RamdaTest\Asset\PlainObjectAsset;
use PHPUnit\Framework\TestCase;

class AlwaysTest extends TestCase
{

  function testAlwaysMustReturnSameObject() {
    $always = always()(new PlainObjectAsset());
    $this->assertSame($always(), $always());
  }

}

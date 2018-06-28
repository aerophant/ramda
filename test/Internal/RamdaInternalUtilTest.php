<?php
namespace Aerophant\RamdaTest\Internal;

use Aerophant\Ramda\Internal\RamdaInternalUtil;
use PHPUnit\Framework\TestCase;

class RamdaInternalUtilTest extends TestCase
{
  public function testWithNoCurryArguments() {
    $this->assertFalse(RamdaInternalUtil::anyCurryArguments([1, 2, 3, 4]));
  }

  public function testWithCurryArguments() {
    $this->assertTrue(RamdaInternalUtil::anyCurryArguments([1, 2, __ , 4]));
  }
}

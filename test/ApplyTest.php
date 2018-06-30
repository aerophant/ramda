<?php
namespace Aerophant\RamdaTest;

use function Aerophant\Ramda\add;
use function Aerophant\Ramda\apply;
use PHPUnit\Framework\TestCase;

class ApplyTest extends TestCase
{
  public function testApply()
  {
    $add = add();
    $firstArg = 1;
    $secondArg = 2;
    $expectedResult = 3;
    $actualResult = apply($add)([$firstArg, $secondArg]);
    $this->assertEquals($expectedResult, $actualResult);
  }
}

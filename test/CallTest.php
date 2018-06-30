<?php
namespace Aerophant\RamdaTest;

use function Aerophant\Ramda\add;
use function Aerophant\Ramda\call;
use PHPUnit\Framework\TestCase;

class CallTest extends TestCase
{
  public function testCallWithCurrying()
  {
    $add = add();
    $firstArg = 1;
    $secondArg = 2;
    $expectedResult = 3;
    $actualResult = call()($add)($firstArg, $secondArg);
    $this->assertEquals($expectedResult, $actualResult);
  }

  public function testCallWithoutCurrying()
  {
    $add = add();
    $firstArg = 1;
    $secondArg = 2;
    $expectedResult = 3;
    $actualResult = call($add, $firstArg, $secondArg);
    $this->assertEquals($expectedResult, $actualResult);
  }
}

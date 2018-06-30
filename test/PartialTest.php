<?php
namespace Aerophant\RamdaTest;

use function Aerophant\Ramda\multiply;
use function Aerophant\Ramda\partial;
use PHPUnit\Framework\TestCase;

class PartialTest extends TestCase
{
  public function testPartial() {
    $double = partial(multiply(), [2]);
    $arg = 10;
    $expectedResult = 20;
    $actualResult = $double($arg);
    $this->assertEquals($expectedResult, $actualResult);
  }

}

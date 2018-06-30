<?php
namespace Aerophant\RamdaTest;

use function Aerophant\Ramda\concat;
use PHPUnit\Framework\TestCase;

class ConcatTest extends TestCase
{
  public function testConcat()
  {
    $firstArray = [1, 2, 3];
    $secondArray = [4, 5, 6];
    $expectedResult = [1, 2, 3, 4, 5, 6];
    $actualResult = concat($firstArray)($secondArray);
    $this->assertEquals($expectedResult, $actualResult);
  }
}

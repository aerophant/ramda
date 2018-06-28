<?php
namespace Aerophant\RamdaTest;

use function Aerophant\Ramda\map;
use PHPUnit\Framework\TestCase;

class MapTest extends TestCase
{
  public function testMap(){
    $array = [1, 2, 3, 4];
    $add10 = function ($it) {
      return $it + 10;
    };
    $this->assertEquals([11, 12, 13, 14], map($add10)($array));
  }
}

<?php
namespace Aerophant\RamdaTest;

use function Aerophant\Ramda\drop;
use function Aerophant\Ramda\dropFirst;
use function Aerophant\Ramda\dropLast;
use PHPUnit\Framework\TestCase;

class DropTest extends TestCase
{

  public function testDropFirst() {
    $array = [1, 3, 4, 5, 7];
    $result = dropFirst($array);
    $this->assertEquals([3, 4, 5, 7], $result);
  }

  public function testDropLast() {
    $array = [1, 3, 4, 5, 7];
    $result = dropLast($array);
    $this->assertEquals([1, 3, 4, 5], $result);
  }

  public function testDropN() {
    $array = [1, 3, 4, 5, 7];
    $result = drop(2)($array);
    $this->assertEquals([1, 3, 5, 7], $result);
  }

}

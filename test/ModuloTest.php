<?php

namespace Aerophant\RamdaTest;

use function Aerophant\Ramda\modulo;
use PHPUnit\Framework\TestCase;

class ModuloTest extends TestCase
{
  public function testModuloEvenNumber()
  {
    $number = 20;
    $expect = 0;
    $actual = modulo($number)(2);
    $this->assertEquals($expect, $actual);
  }

  public function testModuloOddNumber()
  {
    $number = 17;
    $expect = 1;
    $actual = modulo($number)(2);
    $this->assertEquals($expect, $actual);
  }
  public function testCustomModulo()
  {
    $number = 17;
    $expect = 2;
    $modBy = 5;
    $actual = modulo($number)($modBy);
    $this->assertEquals($expect, $actual);
  }
}

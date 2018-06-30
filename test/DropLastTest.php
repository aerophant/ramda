<?php

namespace Aerophant\RamdaTest;

use function Aerophant\Ramda\dropLast;
use PHPUnit\Framework\TestCase;

class DropLastTest extends TestCase
{
  public function testDropLast()
  {
    $this->assertEquals([1, 2, 3, 4], dropLast()([1, 2, 3, 4, 5]));
  }
}

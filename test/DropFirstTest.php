<?php

namespace Aerophant\RamdaTest;

use function Aerophant\Ramda\dropFirst;
use PHPUnit\Framework\TestCase;

class DropFirstTest extends TestCase
{
  public function testDropFirst()
  {
    $this->assertEquals([2,3,4], dropFirst()([1,2,3,4]));
  }
}

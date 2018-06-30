<?php
namespace Aerophant\RamdaTest;

use function Aerophant\Ramda\add;
use PHPUnit\Framework\TestCase;

class AddTest extends TestCase
{
  public function testAdd()
  {
    $this->assertEquals(15, add(7)(8));
  }
}

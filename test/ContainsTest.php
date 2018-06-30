<?php
namespace Aerophant\RamdaTest;

use PHPUnit\Framework\TestCase;
use function Aerophant\Ramda\contains;

class ContainsTest extends TestCase
{
  public function testArrayContainsItem()
  {
    $item = 1;
    $array = [1, 2, 3, 4, 5];
    $actual = contains($item)($array);
    $this->assertTrue($actual);
  }

  public function testArrayDoesNotContainItem()
  {
    $item = 1;
    $array = [2, 3, 4, 5];
    $actual = contains($item)($array);
    $this->assertFalse($actual);
  }
}

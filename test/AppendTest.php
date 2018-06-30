<?php
namespace Aerophant\RamdaTest;

use function Aerophant\Ramda\append;
use PHPUnit\Framework\TestCase;

class AppendTest extends TestCase
{
  public function testAppend() {
    $result = append(3)([1, 2]);
    $this->assertEquals([1, 2, 3], $result);
  }

  public function testAppendWithoutAutoCurry() {
    $result = append(3, [1, 2]);
    $this->assertEquals([1, 2, 3], $result);
  }

}

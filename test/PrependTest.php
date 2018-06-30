<?php
namespace Aerophant\RamdaTest;

use function Aerophant\Ramda\prepend;
use PHPUnit\Framework\TestCase;

class PrependTest extends TestCase
{
  public function testAppend()
  {
    $result = prepend(1)([2, 3]);
    $this->assertEquals([1, 2, 3], $result);
  }

  public function testAppendWithoutAutoCurry()
  {
    $result = prepend(1, [2, 3]);
    $this->assertEquals([1, 2, 3], $result);
  }
}

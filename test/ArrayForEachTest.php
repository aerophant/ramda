<?php
namespace Aerophant\RamdaTest;

use function Aerophant\Ramda\arrayForEach;
use PHPUnit\Framework\TestCase;

class ArrayForEachTest extends TestCase
{

  public function testForEach()
  {
    $list = [1, 2, 3];
    $mockFn = $this->createPartialMock(\stdClass::class, ['__invoke']);
    $mockFn->expects($this->exactly(3))
      ->method('__invoke')
      ->with($this->callback(function ($it) use ($list) {
        return in_array($it, $list);
      }));

    arrayForEach($mockFn)($list);
  }
}

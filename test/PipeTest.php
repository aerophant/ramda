<?php
namespace Aerophant\RamdaTest;

use function Aerophant\Ramda\always;
use function Aerophant\Ramda\pipe;
use PHPUnit\Framework\TestCase;

class PipeTest extends TestCase
{

  /**
   * @throws \Exception
   */
  public function testPipeSingleMethod()
  {
    $piped = pipe(
      always(10)
    );
    $this->assertEquals(10, $piped());
  }

  /**
   * @throws \Exception
   */
  public function testPipeMultipleMethods()
  {
    $piped = pipe(
      function ($a, $b) {
        return $a + $b;
      },
      function ($i) {
        return $i * 10;
      }
    );
    $this->assertEquals(30, $piped(1, 2));
  }
}

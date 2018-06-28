<?php
namespace Aerophant\RamdaTest;

use function Aerophant\Ramda\always;
use function Aerophant\Ramda\compose;
use PHPUnit\Framework\TestCase;

class ComposeTest extends TestCase
{

  /**
   * @throws \Exception
   */
  public function testComposeSingleMethod() {
    $composed = compose(
      always(10)
    );
    $this->assertEquals(10, $composed());
  }

  /**
   * @throws \Exception
   */
  public function testComposeMultipleMethods() {
    $composed = compose(
      function ($i) {
        return $i * 10;
      },
      function ($a, $b) {
        return $a + $b;
      }
    );
    $this->assertEquals(30, $composed(1, 2));
  }
}

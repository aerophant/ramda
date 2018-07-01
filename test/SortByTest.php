<?php

namespace Aerophant\RamdaTest;

use function Aerophant\Ramda\compose;
use function Aerophant\Ramda\path;
use function Aerophant\Ramda\pathOr;
use function Aerophant\Ramda\sortBy;
use PHPUnit\Framework\TestCase;

class SortByTest extends TestCase
{
  /**
   * @throws \Exception
   */
  public function testSortBy()
  {
    $clara = ['name' => 'clara', 'age' => 314.159];
    $bob = ['name' => 'Bob', 'age' => -10];
    $alice = ['name' => 'ALICE', 'age' => 101];
    $sortByNameCaseInsensitive = sortBy(compose(
      'strtolower',
      path(['name'])
    ));
    $expect = [$alice, $bob, $clara];
    $actual = $sortByNameCaseInsensitive([$clara, $bob, $alice]);
    $this->assertEquals($expect, $actual);
  }
}

<?php

namespace Aerophant\RamdaTest;

use function Aerophant\Ramda\match;
use PHPUnit\Framework\TestCase;

class MatchTest extends TestCase
{
  public function testMatch()
  {
    $pattern = '/^([a-z]+)-([0-9]+)$/';
    $testString = 'cat-009';
    $expect = ['cat-009', 'cat', '009'];
    $actual = match($pattern, $testString);
    $this->assertEquals($expect, $actual);
  }

  public function testUnmatch()
  {
    $pattern = '/^([a-z]+)-([0-9]+)$/';
    $testString = 'cat009';
    $expect = [];
    $actual = match($pattern, $testString);
    $this->assertEquals($expect, $actual);
  }
}

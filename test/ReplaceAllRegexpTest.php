<?php

namespace Aerophant\RamdaTest;

use function Aerophant\Ramda\replaceAllRegexp;
use PHPUnit\Framework\TestCase;

class ReplaceAllRegexpTest extends TestCase
{
  public function testReplace()
  {
    $searchRegexp = '/[a-z]+/';
    $replace = 'bar';
    $subject = 'foo foo foo123';
    $expect = 'bar bar bar123';
    $actual = replaceAllRegexp($searchRegexp)($replace)($subject);
    $this->assertEquals($expect, $actual);
  }
}

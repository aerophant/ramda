<?php

namespace Aerophant\RamdaTest;

use function Aerophant\Ramda\replace;
use PHPUnit\Framework\TestCase;

class ReplaceTest extends TestCase
{
  public function testReplace()
  {
    $search = 'foo';
    $replace = 'bar';
    $subject = 'foo foo foo';
    $expect = 'bar foo foo';
    $actual = replace($search)($replace)($subject);
    $this->assertEquals($expect, $actual);
  }
}

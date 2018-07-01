<?php

namespace Aerophant\RamdaTest;

use function Aerophant\Ramda\replace;
use function Aerophant\Ramda\replaceAll;
use PHPUnit\Framework\TestCase;

class ReplaceAllTest extends TestCase
{
  public function testReplace()
  {
    $search = 'foo';
    $replace = 'bar';
    $subject = 'foo foo foo';
    $expect = 'bar bar bar';
    $actual = replaceAll($search)($replace)($subject);
    $this->assertEquals($expect, $actual);
  }
}

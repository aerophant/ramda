<?php
namespace Aerophant\Ramda;

/**
 * @param string $pattern
 * @param string $string
 * @return array|\Closure
 */
function match()
{
  $match = function (string $pattern, string $string) {
    preg_match($pattern, $string, $matches);
    return $matches;
  };
  $arguments = func_get_args();
  $curried = curryN($match, 2);
  return call_user_func_array($curried, $arguments);
}

<?php
namespace Aerophant\Ramda;

/**
 * @param mixed $value
 */
function isNil()
{
  $arguments = func_get_args();
  $curried = curryN('is_null', 1);
  return call_user_func_array($curried, $arguments);
}

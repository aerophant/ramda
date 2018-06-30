<?php
namespace Aerophant\Ramda;

function defaultTo()
{
  $defaultTo = function ($defaultValue, $value) {
    return $value ? $value : $defaultValue;
  };
  $arguments = func_get_args();
  $curried = curryN($defaultTo, 2);
  return call_user_func_array($curried, $arguments);
}

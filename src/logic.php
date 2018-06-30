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

/**
 * (*… → Boolean) → (*… → *) → (*… → *) → (*… → *)
 * @param callable $condition
 * @param callable $onTrue
 * @param callable $onFalse
 * @return \Closure
 */
function ifElse()
{
  $ifElse = function (callable $condition, callable $onTrue, callable $onFalse) {
    return function () use ($condition, $onTrue, $onFalse) {
      $arguments = func_get_args();
      if (call_user_func_array($condition, $arguments)) {
        return call_user_func_array($onTrue, $arguments);
      }
      return call_user_func_array($onFalse, $arguments);
    };
  };
  $arguments = func_get_args();
  $curried = curryN($ifElse, 3);
  return call_user_func_array($curried, $arguments);
}

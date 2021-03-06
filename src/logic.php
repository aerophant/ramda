<?php
namespace Aerophant\Ramda;

/**
 * @param bool $firstValue
 * @param bool $secondValue
 * @return bool|\Closure
 */
function andLogically()
{
  $and = function (bool $firstValue, bool $secondValue) {
    return $firstValue && $secondValue;
  };
  $arguments = func_get_args();
  $curried = curryN($and, 2);
  return call_user_func_array($curried, $arguments);
}

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

/**
 * @param mixed $data
 * @return bool|\Closure
 */
function isEmpty()
{
  $isEmpty = function ($value) {
    return empty($value);
  };
  $arguments = func_get_args();
  $curried = curryN($isEmpty, 1);
  return call_user_func_array($curried, $arguments);
}

/**
 * @param mixed $value
 * @return bool|\Closure
 */
function not()
{
  $not = function ($value) {
    return !$value;
  };
  $arguments = func_get_args();
  $curried = curryN($not, 1);
  return call_user_func_array($curried, $arguments);
}

/**
 * @param bool $firstValue
 * @param bool $secondValue
 * @return bool|\Closure
 */
function orLogically()
{
  $and = function (bool $firstValue, bool $secondValue) {
    return $firstValue || $secondValue;
  };
  $arguments = func_get_args();
  $curried = curryN($and, 2);
  return call_user_func_array($curried, $arguments);
}

<?php
namespace Aerophant\Ramda;

/**
 * @param int $index
 * @param array $array
 * @return mixed
 */
function equals()
{
  $equals = function ($a, $b) {
    return $a == $b;
  };
  $arguments = func_get_args();
  $curried = curryN($equals, 2);
  return call_user_func_array($curried, $arguments);
}

function gt()
{
  $gt = function ($a, $b) {
    return $a > $b;
  };
  $arguments = func_get_args();
  $curried = curryN($gt, 2);
  return call_user_func_array($curried, $arguments);
}

function gte()
{
  $gte = function ($a, $b) {
    return $a >= $b;
  };
  $arguments = func_get_args();
  $curried = curryN($gte, 2);
  return call_user_func_array($curried, $arguments);
}

/**
 * a → a → Boolean
 * @param $firstValue
 * @param $secondValue
 * @return boolean|\Closure
 */
function identical()
{
  $identical = function ($firstValue, $secondValue) {
    return $firstValue === $secondValue;
  };
  $arguments = func_get_args();
  $curried = curryN($identical, 2);
  return call_user_func_array($curried, $arguments);
}

function lt()
{
  $lt = function ($a, $b) {
    return $a < $b;
  };
  $arguments = func_get_args();
  $curried = curryN($lt, 2);
  return call_user_func_array($curried, $arguments);
}

function lte()
{
  $lte = function ($a, $b) {
    return $a <= $b;
  };
  $arguments = func_get_args();
  $curried = curryN($lte, 2);
  return call_user_func_array($curried, $arguments);
}

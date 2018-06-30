<?php
namespace Aerophant\Ramda;

/**
 * @param callable $predicateFunction
 * @param array $array
 * @return mixed
 */
function all()
{
  $all = function (callable $predicateFunction, array $array): bool {
    if (empty($array)) {
      return false;
    }
    foreach ($array as $it) {
      if (!$predicateFunction($it)) {
        return false;
      }
    }
    return true;
  };
  $arguments = func_get_args();
  $curried = curryN($all, 2);
  return call_user_func_array($curried, $arguments);
}

/**
 * @param callable $predicateFunction
 * @param array $array
 * @return bool
 */
function any()
{
  $any = function (callable $predicateFunction, array $array) {
    if (empty($array)) {
      return false;
    }
    foreach ($array as $it) {
      if ($predicateFunction($it)) {
        return true;
      }
    }
    return false;
  };
  $arguments = func_get_args();
  $curriedAny = curryN($any, 2);
  return call_user_func_array($curriedAny, $arguments);
}

/**
 * @param int $index
 * @param array $array
 * @return mixed
 */
function drop()
{
  $drop = function (int $index, array $array) {
    return array_merge(array_slice($array, 0, $index), array_slice($array, $index + 1));
  };
  $arguments = func_get_args();
  $curried = curryN($drop, 2);
  return call_user_func_array($curried, $arguments);
}

/**
 * @param array $array
 * @return mixed
 */
function dropFirst()
{
  $dropFirst = drop(0);
  $arguments = func_get_args();
  $curried = curryN($dropFirst, 1);
  return call_user_func_array($curried, $arguments);
}

/**
 * @param array $array
 * @return mixed
 */
function dropLast()
{
  $dropLast = function (array $array) {
    $index = count($array)-1;
    return array_merge(array_slice($array, 0, $index), array_slice($array, $index + 1));
  };

  $arguments = func_get_args();
  $curried = curryN($dropLast, 1);
  return call_user_func_array($curried, $arguments);
}

/**
 * @param callable $predicateFunction
 * @param array $array
 * @return mixed
 */
function filter()
{
  $filter = function (callable $predicateFunction, array $array) {
    return array_values(array_filter($array, $predicateFunction));
  };
  $arguments = func_get_args();
  $curried = curryN($filter, 2);
  return call_user_func_array($curried, $arguments);
}

/**
 * @param callable $predicateFunction
 * @param array $array
 * @return mixed
 */
function filterPreserveKey()
{
  $filter = function (callable $predicateFunction, array $array) {
    return array_filter($array, $predicateFunction);
  };
  $arguments = func_get_args();
  $curried = curryN($filter, 2);
  return call_user_func_array($curried, $arguments);
}

/**
 * @param callable $mapper
 * @param array $array
 * @return mixed
 */
function map()
{
  $arguments = func_get_args();
  $curried = curryN('array_map', 2);
  return call_user_func_array($curried, $arguments);
}

/**
 * @param callable $accumulator
 * @param $initialValue
 * @param array $array
 * @return mixed
 */
function reduce()
{
  $reduce = function (callable $accumulator, $initialValue, array $array) {
    return array_reduce($array, $accumulator, $initialValue);
  };
  $arguments = func_get_args();
  $curried = curryN($reduce, 3);
  return call_user_func_array($curried, $arguments);
}

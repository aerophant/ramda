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
 * @param callable $fn he function to invoke. Receives one argument
 * @param array $array The list to iterate over.
 * @return null|\Closure
 */
function arrayForEach()
{
  $arrayForEach = function (callable $fn, array $array) {
    foreach ($array as $item) {
      $fn($item);
    }
  };
  $arguments = func_get_args();
  $curriedAny = curryN($arrayForEach, 2);
  return call_user_func_array($curriedAny, $arguments);
}

/**
 * a → [a] → [a]
 * @param mixed $item
 * @param array $array
 * @return array|\Closure
 */
function append()
{
  $append = function ($item, array $array) {
    return array_merge($array, [$item]);
  };
  $arguments = func_get_args();
  $curriedAny = curryN($append, 2);
  return call_user_func_array($curriedAny, $arguments);
}

/**
 * [a] → [a] → [a]
 * @param mixed $item
 * @param array $array
 * @return array|\Closure
 */
function concat()
{
  $concat = function (array $firstArray, array $secondArray) {
    return array_merge($firstArray, $secondArray);
  };
  $arguments = func_get_args();
  $curriedAny = curryN($concat, 2);
  return call_user_func_array($curriedAny, $arguments);
}

/**
 * a → [a] → Boolean
 * @param mixed $item item to compare against
 * @param array $array The array to consider
 * @return boolean|\Closure
 */
function contains()
{
  $contains = partialRight('in_array', [true]);
  $arguments = func_get_args();
  $curriedAny = curryN($contains, 2);
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
 * @param string|array $suffix
 * @param string|array $list
 * @return boolean|\Closure
 */
function endsWith()
{
  $endsWith = function ($suffix, $list) {
    if (is_string($suffix) && is_string($list)) {
      return $suffix === '' || (($temp = strlen($list) - strlen($suffix)) >= 0 && strpos($list, $suffix) !== false);
    }
    if (is_array($suffix) && is_array($list)) {
      $index = count($list) - count($suffix);
      foreach ($suffix as $it) {
        if ($it != $list[$index]) {
          return false;
        }
        $index++;
      }
      return true;
    }
    throw new \InvalidArgumentException(__FUNCTION__ . 'accepts only string or array as it arguments');
  };
  $arguments = func_get_args();
  $curried = curryN($endsWith, 2);
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
 * @param callable $predicateFunction
 * @param array $list
 * @return mixed
 */
function find()
{
  $find = function (callable $predicateFunction, array $list) {
    foreach ($list as $item) {
      if ($predicateFunction($item)) {
        return $item;
      }
    }
    return null;
  };
  $arguments = func_get_args();
  $curried = curryN($find, 2);
  return call_user_func_array($curried, $arguments);
}

function first()
{
  $first = function (array $array) {
    if (empty($array)) {
      return null;
    }
    return $array[0];
  };
  $arguments = func_get_args();
  $curried = curryN($first, 1);
  return call_user_func_array($curried, $arguments);
}

/**
 * @param callable $keySelector
 * @param array $array
 * @return array
 */
function groupBy()
{
  $groupBy = function (callable $keySelector, array $array) {
    return reduce(
      function ($acc, $item) use ($keySelector) {
        $key = $keySelector($item);
        $acc[$key] = array_key_exists($key, $acc) ? array_merge($acc[$key], [$item]) : [$item];
        return $acc;
      },
      [],
      $array
    );
  };
  $arguments = func_get_args();
  $curried = curryN($groupBy, 2);
  return call_user_func_array($curried, $arguments);
}

function head()
{
  $head = function (array $array) {
    if (empty($array)) {
      return null;
    }
    return $array[0];
  };
  $arguments = func_get_args();
  $curried = curryN($head, 1);
  return call_user_func_array($curried, $arguments);
}

/**
 * @param int $index
 * @param $element
 * @param array $array
 * @return array|\Closure
 */
function insert()
{
  $insert = function (int $index, $element, array $array) {
    return array_merge(
      array_slice($array, 0, $index),
      [$element],
      array_slice($array, $index)
    );
  };
  $arguments = func_get_args();
  $curried = curryN($insert, 3);
  return call_user_func_array($curried, $arguments);
}

function last()
{
  $last = function (array $array) {
    if (empty($array)) {
      return null;
    }
    return $array[count($array) - 1];
  };
  $arguments = func_get_args();
  $curried = curryN($last, 1);
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
 * a → [a] → [a]
 * @param mixed $item
 * @param array $array
 * @return array|\Closure
 */
function prepend()
{
  $prepend = function ($item, array $array) {
    return array_merge([$item], $array);
  };
  $arguments = func_get_args();
  $curriedAny = curryN($prepend, 2);
  return call_user_func_array($curriedAny, $arguments);
}

/**
 * @param callable $accumulator
 * @param mixed $initialValue
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

function tail()
{
  $tail = function (array $array) {
    if (empty($array)) {
      return null;
    }
    return $array[count($array) - 1];
  };
  $arguments = func_get_args();
  $curried = curryN($tail, 1);
  return call_user_func_array($curried, $arguments);
}

<?php
namespace Aerophant\Ramda;

/**
 * Number → Number → Number
 * @param integer|float|double $firstValue
 * @param integer|float|double $secondValue
 * @return integer|float|double|\Closure
 */
function add()
{
  $add = function ($firstValue, $secondValue) {
    return $firstValue + $secondValue;
  };
  $arguments = func_get_args();
  $curried = curryN($add, 2);
  return call_user_func_array($curried, $arguments);
}

/**
 * Number → Number → Number
 * @param integer|float|double $firstValue
 * @param integer|float|double $secondValue
 * @return integer|float|double|\Closure
 */
function divide()
{
  $divide = function ($firstValue, $secondValue) {
    return $firstValue / $secondValue;
  };
  $arguments = func_get_args();
  $curried = curryN($divide, 2);
  return call_user_func_array($curried, $arguments);
}

/**
 * @param double|float|integer $value
 * @return double|float|integer
 */
function inc()
{
  $inc = function ($value) {
    return $value + 1;
  };
  $arguments = func_get_args();
  $curried = curryN($inc, 1);
  return call_user_func_array($curried, $arguments);
}

/**
 * @param array $numbers array of numbers
 * @return float|integer|double|\Closure
 */
function mean()
{
  $mean = function (array $numbers) {
    $length = count($numbers);
    if ($length === 0) {
      throw new \InvalidArgumentException('$numbers passed to mean() must not be empty');
    }
    return array_sum($numbers)/$length;
  };
  $arguments = func_get_args();
  $curried = curryN($mean, 1);
  return call_user_func_array($curried, $arguments);
}

function median()
{
  $median = function (array $numbers) {
    $length = count($numbers);
    \sort($numbers, SORT_NUMERIC);
    if ($length % 2 == 0) {
      return mean([$numbers[$length/2], $numbers[$length/2 - 1]]);
    }
    return $numbers[($length-1)/2];
  };
  $arguments = func_get_args();
  $curried = curryN($median, 1);
  return call_user_func_array($curried, $arguments);
}

/**
 * @param integer|float|double $firstValue
 * @param integer|float|double $secondValue
 * @return integer|float|double|\Closure
 */
function modulo()
{
  $modulo = function ($firstValue, $secondValue) {
    return $firstValue % $secondValue;
  };
  $arguments = func_get_args();
  $curried = curryN($modulo, 2);
  return call_user_func_array($curried, $arguments);
}


/**
 * Number → Number → Number
 * @param integer|float|double $firstValue
 * @param integer|float|double $secondValue
 * @return integer|float|double|\Closure
 */
function multiply()
{
  $multiply = function ($firstValue, $secondValue) {
    return $firstValue * $secondValue;
  };
  $arguments = func_get_args();
  $curried = curryN($multiply, 2);
  return call_user_func_array($curried, $arguments);
}

/**
 * Number → Number → Number
 * @param integer|float|double $firstValue
 * @param integer|float|double $secondValue
 * @return integer|float|double|\Closure
 */
function subtract()
{
  $subtract = function ($firstValue, $secondValue) {
    return $firstValue - $secondValue;
  };
  $arguments = func_get_args();
  $curried = curryN($subtract, 2);
  return call_user_func_array($curried, $arguments);
}

/**
 * @param array $array
 * @return double|integer
 */
function sum(array $array = null)
{
  $arguments = func_get_args();
  $curried = curryN('array_sum', 1);
  return call_user_func_array($curried, $arguments);
}

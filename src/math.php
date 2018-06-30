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

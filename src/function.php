<?php
namespace Aerophant\Ramda;

/**
 * @param mixed $data
 * @return \Closure
 */
function always()
{
  $always = function ($data) {
    return function () use ($data) {
      return $data;
    };
  };
  $arguments = func_get_args();
  $curried = curryN($always, 1);
  return call_user_func_array($curried, $arguments);
}

/**
 * @return callable
 * @throws \Exception
 */
function compose()
{
  $arguments = array_reverse(func_get_args());
  return call_user_func_array('Aerophant\Ramda\pipe', $arguments);
}

/**
 * @param string $class
 * @return \Closure
 */
function construct()
{
  $construct = function ($class) {
    return function () use ($class) {
      return new $class();
    };
  };
  $arguments = func_get_args();
  $curried = curryN($construct, 1);
  return call_user_func_array($curried, $arguments);
}

function curryN(callable $fn, int $numberOfArguments)
{
  return function () use ($fn, $numberOfArguments) {
    $arguments = func_get_args();
    $length = count($arguments);
    if ($length > $numberOfArguments) {
      throw new \InvalidArgumentException(
        "Number of passed($length) parameters is greater than expected($numberOfArguments)"
      );
    }
    // NO CURRY
    if ($length == $numberOfArguments) {
      return call_user_func_array($fn, $arguments);
    }
    // AUTO CURRY
    $curriedFn = function () use ($fn, $arguments) {
      $curriedArguments = func_get_args();
      return call_user_func_array($fn, array_merge($arguments, $curriedArguments));
    };
    return curryN($curriedFn, $numberOfArguments - $length);
  };
}

function partial(callable $fn, array $args) {
  return function () use ($fn, $args) {
    $arguments = func_get_args();
    return call_user_func_array($fn, array_merge($args, $arguments));
  };
}

function partialRight(callable $fn, array $args) {
  return function () use ($fn, $args) {
    $arguments = func_get_args();
    return call_user_func_array($fn, array_merge($arguments, $args));
  };
}

/**
 * @return callable
 * @throws \Exception
 */
function pipe()
{
  $arguments = func_get_args();
  $length = count($arguments);
  if ($length === 0) {
    throw new \Exception("pipe requires at least one argument");
  }
  return function () use ($arguments) {
    $internalArguments = func_get_args();
    $initialValue = call_user_func_array($arguments[0], $internalArguments);
    $accumulator = function ($acc, $it) {
      return call_user_func_array($it, [$acc]);
    };
    return array_reduce(drop(0, $arguments), $accumulator, $initialValue);
  };
}

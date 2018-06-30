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
 * @param callable $fn
 * @param array $args
 * @return string
 */
function apply()
{
  $apply = function (callable $fn, array $args) {
    return call_user_func_array($fn, $args);
  };
  $arguments = func_get_args();
  $curried = curryN($apply, 2);
  return call_user_func_array($curried, $arguments);
}

/**
 * @param callable $fn
 * @param mixed ...$args
 * @return string
 */
function call()
{
  $arguments = func_get_args();
  $length = count($arguments);
  switch ($length) {
    case 0:
          return 'Aerophant\Ramda\call';
    case 1:
      $fn = $arguments[0];
          return function (...$arguments) use ($fn) {
            return call_user_func_array($fn, $arguments);
          };
    default:
      $fn = $arguments[0];
      $arguments = dropFirst($arguments);
          return call_user_func_array($fn, $arguments);
  }
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

/**
 * ((a, b, c, …, n) → x) → [a, b, c, …] → ((d, e, f, …, n) → x)
 * @param callable $fn
 * @param array $args
 * @return \Closure
 */
function partial(callable $fn, array $args)
{
  return function () use ($fn, $args) {
    $arguments = func_get_args();
    return call_user_func_array($fn, array_merge($args, $arguments));
  };
}

/**
 * ((a, b, c, …, n) → x) → [d, e, f, …, n] → ((a, b, c, …) → x)
 * @param callable $fn
 * @param array $args
 * @return \Closure
 */
function partialRight(callable $fn, array $args)
{
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

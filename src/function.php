<?php
namespace Aerophant\Ramda;

use Aerophant\Ramda\Internal\RamdaInternalUtil;

define('__', '__AEROPHANT_RAMDA_CURRY_ARGUMENT__');

/**
 * @param int $a
 * @param int $b
 * @return int
 */
function add() {
  $add = function (int $a, int $b) {
    return $a + $b;
  };
  $arguments = func_get_args();
  $curried = curryN($add, 2);
  return call_user_func_array($curried, $arguments);
}

/**
 * @param mixed $data
 * @return \Closure
 */
function always($data) {
  return function () use ($data) {
    return $data;
  };
}

/**
 * @return callable
 * @throws \Exception
 */
function compose() {
  $arguments = array_reverse(func_get_args());
  return call_user_func_array('Aerophant\Ramda\pipe', $arguments);
}

function curryN(callable $fn, int $numberOfArguments) {
  return function () use ($fn, $numberOfArguments) {
    $arguments = func_get_args();
    $length = count($arguments);
    if ($length > $length) {
      throw new \InvalidArgumentException("Number of passed($length) parameters is greater than expected($numberOfArguments)");
    }
    $anyCurryArguments = RamdaInternalUtil::anyCurryArguments($arguments);
    // NO CURRY
    if ($length == $numberOfArguments && !$anyCurryArguments) {
      return call_user_func_array($fn, $arguments);
    }
    // AUTO CURRY
    if (!$anyCurryArguments) {
      $curriedFn = function () use ($fn, $arguments, $length) {
        $curriedArguments = func_get_args();
        return call_user_func_array($fn, array_merge($arguments, $curriedArguments));
      };
      return curryN($curriedFn, $numberOfArguments - $length);
    }
    // CURRY WITH _
    pipe(
      map([RamdaInternalUtil::class, 'isCurryArgument']),
      function ($array) {}
    );
    throw new \Exception('Curry with _ is not supported yet');
  };
}

//TODO change to construct
function factory($class) {
  return function () use ($class) {
    return new $class();
  };
}

/**
 * @return callable
 * @throws \Exception
 */
function pipe() {
  $arguments = func_get_args();
  $length = count($arguments);
  if($length === 0) {
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

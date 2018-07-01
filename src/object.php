<?php
namespace Aerophant\Ramda;

/**
 * @param array $paths
 * @param mixed $obj
 * @return mixed|\Closure
 */
function path()
{
  $path = function (array $paths, $obj) {
    return reduce(
      function ($acc, $item) {
        if ($acc === null) {
          return null;
        }
        if (is_array($acc)) {
          return array_key_exists($item, $acc) ? $acc[$item] : null;
        }
        throw new \InvalidArgumentException('path(array $paths, $obj) only support array object');
      },
      $obj,
      $paths
    );
  };
  $arguments = func_get_args();
  $curried = curryN($path, 2);
  return call_user_func_array($curried, $arguments);
}

/**
 * @param mixed $defaultValue
 * @param array $paths
 * @param mixed $obj
 * @return mixed|\Closure
 */
function pathOr()
{
  $pathOr = function ($defaultValue, array $paths, $obj) {
    $value = path($paths, $obj);
    return $value ? $value : $defaultValue;
  };
  $arguments = func_get_args();
  $curried = curryN($pathOr, 3);
  return call_user_func_array($curried, $arguments);
}

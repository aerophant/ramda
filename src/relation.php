<?php
namespace Aerophant\Ramda;

/**
 * @param int $index
 * @param array $array
 * @return mixed
 */
function equals(){
  $equals = function($a, $b){
    return $a == $b;
  };
  $arguments = func_get_args();
  $curried = curryN($equals, 2);
  return call_user_func_array($curried, $arguments);
}


<?php
namespace Aerophant\Ramda;

/**
 * Regex match (Ramda-style). Named regexMatch because `match` is reserved in PHP 8+.
 *
 * @param string $pattern
 * @param string $string
 * @return array|\Closure
 */
function regexMatch()
{
  $fn = function (string $pattern, string $string) {
    preg_match($pattern, $string, $matches);
    return $matches;
  };
  $arguments = func_get_args();
  $curried = curryN($fn, 2);
  return call_user_func_array($curried, $arguments);
}

/**
 * @param string $searchString
 * @param string $replaceString
 * @param string $subject
 * @return string
 */
function replace()
{
  $replaceFn = function ($searchString, $replaceString, $subject) {
    $searchString = '/'.preg_quote($searchString, '/').'/';
    return preg_replace($searchString, $replaceString, $subject, 1);
  };

  $arguments = func_get_args();
  $curried = curryN($replaceFn, 3);
  return call_user_func_array($curried, $arguments);
}

/**
 * @param string $searchString
 * @param string $replaceString
 * @param string $subject
 * @return string
 */
function replaceAll()
{
  $arguments = func_get_args();
  $curried = curryN('str_replace', 3);
  return call_user_func_array($curried, $arguments);
}

/**
 * @param string $searchRegexp
 * @param string $replaceString
 * @param string $subject
 * @return string
 */
function replaceAllRegexp()
{
  $arguments = func_get_args();
  $curried = curryN('preg_replace', 3);
  return call_user_func_array($curried, $arguments);
}

/**
 * @param string $delimiter
 * @param string $string
 * @return mixed
 */
function split($delimiter = null, $string = null)
{
  $arguments = func_get_args();
  $curried = curryN('explode', 2);
  return call_user_func_array($curried, $arguments);
}

function toLower()
{
  $arguments = func_get_args();
  $curried = curryN('strtolower', 1);
  return call_user_func_array($curried, $arguments);
}

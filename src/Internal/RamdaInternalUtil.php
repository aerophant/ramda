<?php
namespace Aerophant\Ramda\Internal;

class RamdaInternalUtil
{
  public static function anyCurryArguments(array $args): bool {
    foreach ($args as $it) {
      if ($it === __) {
        return true;
      }
    }
    return false;
  }

  public static function isCurryArgument($arg): bool {
    return $arg === __;
  }
}

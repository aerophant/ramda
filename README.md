# ramda
Modern functional programming library inspired by ramdajs

[![Build Status](https://travis-ci.org/Roave/BetterReflection.svg?branch=master)](https://travis-ci.org/Roave/BetterReflection) [![Build Status](https://ci.appveyor.com/api/projects/status/github/Roave/BetterReflection?svg=true&branch=master)](https://ci.appveyor.com/project/Ocramius/betterreflection-4jx2w) [![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/Roave/BetterReflection/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/Roave/BetterReflection/?branch=master) [![Code Coverage](https://scrutinizer-ci.com/g/Roave/BetterReflection/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/Roave/BetterReflection/?branch=master) [![Latest Stable Version](https://poser.pugx.org/roave/better-reflection/v/stable)](https://packagist.org/packages/roave/better-reflection) [![License](https://poser.pugx.org/roave/better-reflection/license)](https://packagist.org/packages/roave/better-reflection)

## Under Development :(

## Why prefer `aerophant/ramda` over other functional libraries or native php functions
- `aerophant/ramda` provide auto curry for you and give you better life to do function composition like `ramdajs` or `lodash/fp`.

      pipe(
         always([1, 2, 3, 4, 5]),
         map(add(1)),
         // filter even numbers only
         filter(pipe(
           modulo(__, 2),
           equals(0)
         ))
      )();
      // => [2, 4, 6]
      
## RoadMap
- version 0.1: https://github.com/aerophant/ramda/issues/1
    
## Want to help
- You can suggest function by creating issues and/or PR
- help improve performance by creating PR.

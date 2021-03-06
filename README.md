# Aerophant Ramda, Modern functional programming library inspired by ramdajs

[![Build Status](https://travis-ci.org/aerophant/ramda.svg?branch=master)](https://travis-ci.org/aerophant/ramda) 
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/aerophant/ramda/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/aerophant/ramda/?branch=master) 
[![Code Coverage](https://scrutinizer-ci.com/g/aerophant/ramda/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/aerophant/ramda/?branch=master) 
[![Latest Stable Version](https://poser.pugx.org/aerophant/ramda/v/stable)](https://packagist.org/packages/aerophant/ramda) 
[![License](https://poser.pugx.org/aerophant/ramda/license)](https://packagist.org/packages/aerophant/ramda)

Under Development :(

## Adventage of `Aerophant Ramda`
- `aerophant/ramda` provide auto curry for you and give you better way to do function composition like `ramdajs`

      pipe(
         always([1, 2, 3, 4, 5]),
         map(add(1)),
         // filter even numbers only
         filter(pipe(
           partialRight(modulo(), [2]),
           equals(0)
         ))
      )();
      // => [2, 4, 6]
      
- Easy to pass almost of `aerophant/ramda` functions as callable, just call it without any argument.

       $alwaysReturn1 = call_user_func_array(always(), [1]);
      
## RoadMap
- version 0.0.x : Under development, not all usseful functions supported
- version 0.1: https://github.com/aerophant/ramda/issues/1
    
## Want to help me ?
- You can suggest function by creating issues and/or PR
- help improve performance by creating PR.

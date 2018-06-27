# ramda
Modern functional programming library inspired by ramdajs

## Under Development :(

## Why prefer `aerophant/ramda` over other functional library or native php functions
- `aerophant/ramda` provide auto curry for you and give you better life to do function composition like `ramdajs` or `lodash/fp`.

      pipe(
         add(1),
         // filter even numbers only
         filter(pipe(
           modulo(_, 2),
           equals(0)
         ))
      )([1, 2, 3, 4, 5]);
      // => [2, 4, 6]
      
## RoadMap
- version 0.1
    - https://github.com/aerophant/ramda/issues/1
    
## Want to help
- You can suggest function by creating issues and/or PR
- help improve performance by creating PR.

# Thank you

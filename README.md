# ramda
Modern functional programming library inspired by ramdajs

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
- version 0.1
    - #1
    
## Want to help
- You can suggest function by creating issues and/or PR
- help improve performance by creating PR.

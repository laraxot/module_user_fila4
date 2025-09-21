<?php

<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> b93ef594b4 (.)
>>>>>>> 81efa49 (.)
declare(strict_types=1);


namespace Modules\User\Http\Middleware;

use BackedEnum;
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
namespace Modules\User\Http\Middleware;

>>>>>>> a12f125f4a (.)
=======
>>>>>>> b93ef594b4 (.)
=======
namespace Modules\User\Http\Middleware;

>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> b93ef594b4 (.)
>>>>>>> 81efa49 (.)
/**
 * Route::put('/post/{id}', function (string $id) {
 *   // ...
 * })->middleware(EnsureUserHasRole::class.':editor');
 * Route::put('/post/{id}', function (string $id) {
 *     // ...
 *})->middleware(EnsureUserHasRole::class.':editor,publisher');
 */
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
=======
>>>>>>> origin/develop
/** 
* Route::put('/post/{id}', function (string $id) {
*   // ...
* })->middleware(EnsureUserHasRole::class.':editor');
* Route::put('/post/{id}', function (string $id) {
*     // ...
*})->middleware(EnsureUserHasRole::class.':editor,publisher');
*/
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)

class EnsureUserHasType
{
    /**
     * Handle an incoming request.
     *
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
     * @param Closure(Request):Response $next
     */
    public function handle(Request $request, Closure $next, string $type): Response
    {
<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> b93ef594b4 (.)
>>>>>>> 81efa49 (.)
        $userType = $request->user()?->type;

        if ($userType instanceof BackedEnum && $userType->value === $type) {
            return $next($request);
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 81efa49 (.)
        }

        if (is_string($userType) && $userType === $type) {
            return $next($request);
        }

        return redirect()->route('home');
    }
}
<<<<<<< HEAD
=======
=======
=======
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $type): Response
    {
>>>>>>> origin/develop
        
        if ($request->user()?->type->value !== $type) {
            // Redirect...
            return redirect()->route('home');
<<<<<<< HEAD
=======
>>>>>>> b93ef594b4 (.)
        }

        if (is_string($userType) && $userType === $type) {
            return $next($request);
        }

        return redirect()->route('home');
    }
}
<<<<<<< HEAD
>>>>>>> a12f125f4a (.)
=======
>>>>>>> b93ef594b4 (.)
=======
        }

        return $next($request);
    }
}
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)

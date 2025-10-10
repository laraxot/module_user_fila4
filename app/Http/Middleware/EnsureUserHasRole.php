<?php

<<<<<<< HEAD
declare(strict_types=1);


=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
declare(strict_types=1);


=======
>>>>>>> a12f125f4a (.)
=======
declare(strict_types=1);


>>>>>>> b93ef594b4 (.)
=======
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
namespace Modules\User\Http\Middleware;

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

class EnsureUserHasRole
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
    public function handle(Request $request, Closure $next, string $role): Response
    {
<<<<<<< HEAD
        $user = $request->user();
        // Check if user has role using Spatie Permission's hasRole method
        if (!$user || !method_exists($user, 'hasRole') || !$user->hasRole($role)) {
=======
<<<<<<< HEAD
<<<<<<< HEAD
        $user = $request->user();
        // Check if user has role using Spatie Permission's hasRole method
        if (!$user || !method_exists($user, 'hasRole') || !$user->hasRole($role)) {
=======
        if (! $request->user()?->hasRole($role)) {
>>>>>>> a12f125f4a (.)
=======
        $user = $request->user();
        // Check if user has role using Spatie Permission's hasRole method
        if (!$user || !method_exists($user, 'hasRole') || !$user->hasRole($role)) {
>>>>>>> b93ef594b4 (.)
=======
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        if (! $request->user()?->hasRole($role)) {
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)
            // Redirect...
            return redirect()->route('home');
        }

        return $next($request);
    }
<<<<<<< HEAD
}
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
}
=======
}
>>>>>>> a12f125f4a (.)
=======
}
>>>>>>> b93ef594b4 (.)
=======
}
>>>>>>> origin/develop
>>>>>>> 81efa49 (.)

<?php


namespace App\Http\Middleware;

use Closure;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next, $roles)
    {
        $allowAccess = false;
        if (auth()->check()) {
            foreach ($roles as $role) {
                if ($request->user()->role == $role) {
                    $allowAccess = true;
                    break;
                }
            }
        }

        if (!$allowAccess) {
            abort(401, 'This action is unauthorized.');
        }
        return $next($request);
    }
}

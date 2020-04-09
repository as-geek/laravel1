<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckHashPassword
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = Auth::user();
        $errors = [];
        if (!\Hash::check($request->post('old_password'), $user->password)) {
            $errors['password'][] = 'Текущий пароль указан неверно';

            return redirect()->route('profile::update')
                ->withErrors($errors);
        }
        return $next($request);
    }
}

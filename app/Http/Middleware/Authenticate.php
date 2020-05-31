<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            $usuario=\Auth::user();
        if (isset($usuario)) {
            if ($usuario->tipo_usuario == 1) {
                return route('usuario.error');
            }else if ($usuario->tipo_usuario == 2) {
                return route('artista.error');
            }
        }else{
            return route('login');
        }
        }
    }
}

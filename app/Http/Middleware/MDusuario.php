<?php

namespace App\Http\Middleware;

use Closure;

class MDusuario
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
        $usuario=\Auth::user();
        if (isset($usuario)) {
            if ($usuario->tipo_usuario!=1) {
                return redirect('sin_acceso');
            }
        }else{
            return redirect('login');
        }
        return $next($request);
    }
}

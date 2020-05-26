<?php

namespace Illuminate\Foundation\Auth;

use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

trait RegistersUsers
{
    use RedirectsUsers; 

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    /**
     * Handle a registration request for the application. 
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
       if ($request->tipo_usuario == 1) { //usuario
           $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        $this->guard($request->tipo_usuario)->login($user);

        if ($response = $this->registered($request, $user)) {
            return $response;
        }

        return $request->wantsJson()
                    ? new Response('', 201)
                    : redirect($this->redirectPath($request)); 
        }


        elseif ($request->tipo_usuario == 2) { //artista
           $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        $this->guard($request->tipo_usuario)->login($user);

        if ($response = $this->registered($request, $user)) {
            return $response;
        }

        return $request->wantsJson()
                    ? new Response('', 201)
                    : redirect($this->redirectPath($request));
        }
        
    }

    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard($tipo_usuario)
    {
        //return Auth::guard();
                if ($tipo_usuario==1) { 
            return Auth::guard();
        }elseif ($tipo_usuario==2) {
             return Auth::guard('artista');
        }
        
    }

    /**
     * The user has been registered.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function registered(Request $request, $user)
    {
        //
    }
}

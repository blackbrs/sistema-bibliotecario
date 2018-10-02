<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nombres'       => 'required|string|max:255',
            'apellidos'     => 'required|string|max:225',
            'nacimiento'    => 'required|date',
            'sexo'          => 'required|string|max:10',
            'Npadres'       => 'required|string|max:255',
            'telefono'      => 'required|numeric',
            'email'         => 'required|string|email|max:255|unique:users',
            'password'      => 'required|string|min:6|confirmed',
        ],[
            'nombres.required'      =>'El campo de nombres es obligatorio',
            'apellidos.required'    =>'El campo de apellidos es obligatorio',
            'nacimiento.required'   =>'El campo de fecha de nacimiento es obligatorio',
            'sexo.required'         =>'El campo de sexo es obligatorio',
            'Npadres.required'      =>'El campo del nomnbre de uno de sus padres es obligatorio',
            'telefono.required'     =>'El campo de nuemero de telefono es obligatorio',
            'email.required'        =>'El campo de correo electronico es obligatorio',
            'password.required'     =>'El campo de contraseña es obligatorio',
            'password.min'          =>'La contraseñ debe poseer almenos 6 caracteres'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'nombres'       => $data['nombres'],
            'apellidos'     => $data['apellidos'],
            'nacimiento'    => $data['nacimiento'],
            'sexo'          => $data['sexo'],
            'Npadres'       => $data['Npadres'],
            'telefono'      => $data['telefono'],
            'email'         => $data['email'],
            'password'      => bcrypt($data['password']),
        ]);
    }
}

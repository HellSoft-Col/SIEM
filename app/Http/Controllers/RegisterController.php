<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function registro()
    {
        return view('registerUser.registro');
    }

    public function store()
    {
        $data = request()->validate([
            'email' => ['required', 'email', 'unique:users,email', 'Regex:/^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/'],
            'confirmEmail' => 'required',
            'password' => ['required', 'Regex:/^(((?=.*[a-z])(?=.*[A-Z]))|((?=.*[a-z])(?=.*[0-9]))|((?=.*[A-Z])(?=.*[0-9])))(?=.{6,})/'],
            'confirmPassword' => 'required'
        ],[
            'email.required' => 'El campo correo institucional es obligatorio',
            'email.regex' => 'Debe ingresar un correo válido',
            'confirmEmail.required' => 'Debe confirmar el correo institucional',
            'password.required' => 'El campo contraseña es obligatorio',
            'password.regex' => 'La contraseña debe tener 8 o más caracteres y debe contener por lo menos: una letra minúscula, 
            una letra mayúscula, un número, un caracter especial (+,-,.).',
            'confirmPassword.required' => 'Debe confirmar la contraseña'
            ]);

        if ($data['email'] == $data['confirmEmail'] && $data['password'] == $data['confirmPassword']){
            User::create([
                'email' => $data['email'],
                'password' => bcrypt($data['password'])
            ]);
            return redirect()->route('user.update');
        }

        return redirect()->route('user.create');

    }

    public function update(User $user)
    {
        return view('registerUser.update', ['user' => $user]);
    }

    public function profile(User $user)
    {
        $data = request()->validate([
            'name' => ['required','Regex:/^[a-zA-Z]+$/'],
            'lastName' => ['required','Regex:/^[a-zA-Z]+$/'],
            'username' => ['required','Regex:/^[a-zA-Z0-9]*$/'],
            'cedula' => ['required', 'Regex:/^[0-9]+$/'],
            'identification' => ['required', 'Regex:/^[0-9]+$/'],
            'semester' => ['required', 'Regex:/^[0-9]+$/'],
        ],[
            'required' => 'Los campos son requeridos',
            'name.regex' => 'El campo nombres solo debe contener letras minúsculas y mayúsculas',
            'lastName.regex' => 'El campo apellidos solo debe contener letras minúsculas y mayúsculas',
            'username.regex' => 'El campo nombre de usuario debe contener letras minúsculas, mayúsculas o números',
            'regex' => 'Debe contener solo números'
        ]);
        $name = $data['name'].' '.$data['lastName'];
        $user->update([
            'name' => $name,
            'identification' => (int)$data['identification'],
            'semester' => (int)$data['semester']
        ]);
        return redirect()->route('user.main');
    }

    public function menuPrincipal()
    {
        return 'Registro exitoso';
    }
}

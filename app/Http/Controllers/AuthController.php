<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index() {
        return view("modulos.auth.login");
    }

    public function logeo(Request $request) {
        $credenciales = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // busca al usuario
        $user = User::where('email', $request->email)->first();

        //comprueba sus credenciales
        if (!$user || !Hash::check($request->password, $user->password)) {
            return back()->withErrors(['email' => 'Credencial Incorrecta !!!'])->withInput();
        }

        //comprueba si esta activo o no
        if (!$user->activo) { 
            return back()->withErrors(['email' => 'Cuenta Inactiva !!!'])->withInput();
        }

        //crear la sesion del usuario
        Auth::login($user);
        $request->session()->regenerate();

        return to_route('home')->with('success', 'Bienvenido(a) al Sistema, esperamos que disfrutes del mismo!!!');
    }

    public function addAdmin(){
    User::create([
        'name' => 'Administrador',
        'email' => 'admin@art.correos.cu',
        'password' => Hash::make('admin'),
        'activo' => true,
        'rol' => 'admin'
    ]);

    return "Admin creado correctamente";
    }

    public function logout() {
    Auth::logout();
    return to_route('login');
    }

}

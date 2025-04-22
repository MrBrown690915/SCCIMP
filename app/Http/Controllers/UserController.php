<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Empresa;
use App\Models\Local;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Exception;
use PhpParser\Node\Stmt\TryCatch;

class UserController extends Controller
{
    public function index()
    {
    //    $users = User::with('empresa')->get();
    //    $empresas = Empresa::all();

        $empresa_id = Auth::User()->empresa_id;
        $empresas = Empresa::all();
        $users = User::where('empresa_id',$empresa_id)->orderBy('name', 'asc')->get();
        $locals = Local::all();

        return view('modulos.usuarios.index', compact('users','locals','empresas'));
    }

    public function estado($id, $estado){
        $user = User::find($id);
        $user->activo = $estado;
        return $user->save();
    }

    public function create()
    {
        $empresas = Empresa::all();
        $locals = Local::all();
        $user = new User();

        return view('modulos.usuarios.create', compact('user','locals', 'empresas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //$datos = request()->all();
        //return response()->json($datos);
        
        $request->validate([
            'ci' => 'required|unique:users,ci|max:11|min:11',
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
            'password'=>'required|confirmed',
            'rol' => 'required',
        ],[
            'ci.required' => "Ingrese el Carnet de Identidad",
            'ci.unique' => "Ya ese Carnet de Identidad está regístrado !!!",
            'ci.min'=> "El Carnet de Identidad es de 11 dígitos, Revise",
            'ci.max'=> "El Carnet de Identidad excede los 11 dígitos",
            'name.required' => "Ingrese el Nombre del Usuario",
            'email.required' => "Ingrese un correo electrónico del usuario",
            'password.required' => "Ingrese la Contraseña",
            'password.confirmed'=>'Las contraseñas no coinciden',
            'rol.required' => "Seleccione el rol que ocupa",
            'email.unique' => "Ya este Correo está regístrado !!!",
        ]);

        $user = new User();
        $user->ci = $request->ci;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->empresa_id = $request->empresa_id;
        $user->local_id = $request->local_id;
        $user->rol = $request->rol;
        $user->save();

        return to_route('usuarios.index')->with('success', 'Usuario creado exitosamente.');

    }

    public function show( $id)
    {
        $user = User::find($id);
        return view('modulos.usuarios.index', compact('user'));
    }
    
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $empresas = Empresa::all();
        $locals = Local::all();
        
        return view('modulos.usuarios.edit', compact('user','empresas','locals'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //$datos = request()->all();
        //return response()->json($datos);

        $request->validate([
            'ci' => 'required|unique:users,ci,'.$id.'|max:11|min:11',
            'name'=>'required',
            'email' => 'required|unique:users,email,'.$id,
            'password' => 'nullable|string|min:8|confirmed',
        ],[
            'ci.required' => "Ingrese el Carnet de Identidad",
            'ci.unique' => "Ya ese Carnet de Identidad está regístrado !!!",
            'ci.min'=> "El Carnet de Identidad no alcanza sus 11 dígitos, Revise",
            'ci.max'=> "El Carnet de Identidad excede los 11 dígitos",
            'name.required'=>'Ingrese el Nombre del Usuario',
            'email.required'=>'Ingrese el Correo Electrónico',
            'email.unique'=>'Ya el Correo Electrónico ha sido registrado por otro Usuario',
            'password.confirmed' => 'Las contraseñas no coinciden.',  
            'password.min' => 'La contraseña debe tener al menos 8 caracteres.',  
        ]);

        $user = User::find($id);
        $user->ci = $request->ci;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->rol = $request->rol;
        if($request->filled('password')){
            $user->password = Hash::make($request->password);
        }
        $user->empresa_id = $request->empresa_id;
        $user->local_id = $request->local_id;
        $user->save();

        return Redirect::route('usuarios.index')->with('success', 'Usuario actualizado exitosamente.');
        
    }

    public function destroy(string $id)
    {
        $user = User::find($id);

        $user->delete();
        return redirect()->back()->with('success', 'Usuario eliminado exitosamente.');
        
    }

}

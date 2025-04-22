<?php

namespace App\Http\Controllers;

use App\Models\Local;
use App\Models\Empresa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class LocalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $empresa_id = Auth::User()->empresa_id;
        $empresas = Empresa::all();
        $locals = Local::where('empresa_id',$empresa_id)->orderBy('nombre', 'asc')->get();

        return view('modulos.locales.index', compact('locals','empresas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $local = new Local();
        $empresas = Empresa::all();
        return view('modulos.locales.create-local', compact('local','empresas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    //    $datos = request()->all();
    //    return response()->json($datos);
            
    $request->validate([
        'nombre' => 'required|unique:locals',
        'direccion' => 'required',
        'email' => 'required|unique:locals',
        'telef' => 'required',
        'cp' => 'required',
    ],[
        'nombre.required' => "Ingrese el Nombre del Local",
        'direccion.required' => "Ingrese la dirección postal del Local",
        'telef.required' => "Ingrese un teléfono del Local",
        'email.required' => "Ingrese un correo electrónico del Local",
        'cp.required' => "Ingrese el código postal del Local",
        'email.unique' => "Ya este Correo está regístrado !!!",
        'nombre.unique' => "Ya este Local está regístrado !!!",
    ]);

    $local = new Local();
    $local->nombre = $request->nombre;
    $local->direccion = $request->direccion;
    $local->email = $request->email;
    $local->telef = $request->telef;
    $local->cp = $request->cp;
    $local->empresa_id = $request->empresa_id;
    $local->save();
    
    return to_route('locales.index')->with('success', 'El Local ha sido creado de forma exitosa !!!.');
}

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $local = Local::findOrFail($id);
        return view('modulos.locales.index', compact('local'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $local = Local::findOrFail($id);
        $empresas = Empresa::all();

        return view('modulos.locales.edit-local', compact('empresas','local'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //$datos = request()->all();
        //return response()->json($datos);

    $request->validate([
        'nombre' => 'required|unique:locals,nombre,'.$id,
        'direccion' => 'required',
        'email' => 'required|unique:locals,email,'.$id,
        'telef' => 'required',
        'cp' => 'required',
    ],[
        'nombre.required' => "Ingrese el Nombre del Local",
        'direccion.required' => "Ingrese la dirección postal del Local",
        'telef.required' => "Ingrese un teléfono del Local",
        'email.required' => "Ingrese un correo electrónico del Local",
        'cp.required' => "Ingrese el código postal del Local",
        'email.unique' => "Ya este Correo está regístrado !!!",
        'nombre.unique' => "Ya este Local está regístrado !!!",
    ]);

    $local = Local::find($id);
    $local->nombre = $request->nombre;
    $local->direccion = $request->direccion;
    $local->email = $request->email;
    $local->telef = $request->telef;
    $local->cp = $request->cp;
    $local->empresa_id = $request->empresa_id;
    $local->save();

    return Redirect::route('locales.index')->with('success', 'El Local ha sido actualizado de forma exitosa !!!.');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $local = Local::find($id);
        $local->delete();
        return redirect()->back()->with('success', 'El Local ha sido eliminado de forma exitosa !!!.');
    }

    public function estado($id, $estado){
        $local = Local::find($id);
        $local->activo = $estado;
        return $local->save();
    }
}

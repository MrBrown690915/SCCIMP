<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use App\Models\User;
use App\Models\Local;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $empresas = Empresa::orderBy('nombre', 'asc')->get();
        $locals = Local::orderBy('nombre', 'asc')->get();
        return view('modulos.empresa.index', compact('empresas','locals'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Empresa $empresa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Empresa $empresa)
    {
        $empresa_id = Auth::user()->empresa_id;
        $empresa = Empresa::where('id',$empresa_id)->first();
        return view('modulos.empresa.edit', compact('empresa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //  $datos = request()->all();
        //  return response()->json($datos);

        $request->validate([
            'nombre'=>'required',
        //    'provincia'=>'required',
            'direccion'=>'required',
            'cp'=>'required',
            'nit'=>'required',
            'telef'=>'required',
            'email'=>'required',
        ],
         [
            'nombre.required'=>'Ingrese el Nombre de la Empresa',
        //    'provincia.required'=>'Ingrese la empincia',
            'direccion.required'=>'Ingrese la Dirección',
            'cp.required'=>'Ingrese el Código Postal',
            'nit.required'=>'Ingrese el Código de Identificación Tributaria',
            'telef.required'=>'Ingrese el o los Teléfonos',
            'email.required'=>'Ingrese el Correo Electrónico',
         ]);

         $emp = Empresa::findOrFail($id);
         $emp->nombre = $request->nombre;
         $emp->direccion = $request->direccion;
         $emp->telef = $request->telef;
         $emp->email = $request->email;
         $emp->cp = $request->cp;
         $emp->nit = $request->nit;
         $emp->save();
 
         return redirect()->route('empresa.index')
            ->with('success', 'Datos de la Empresa modificados con Éxito'); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Empresa $empresa)
    {
        //
    }
}

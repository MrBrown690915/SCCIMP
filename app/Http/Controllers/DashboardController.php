<?php  

namespace App\Http\Controllers;  

use App\Models\Empresa;  
use App\Models\User;  
use App\Models\Local;  
use App\Models\Producto;
use App\Models\Inventario;  
use App\Models\Provehedor;  
use App\Models\Compra;  
use App\Models\Cliente;  
use App\Models\Venta;  
use Illuminate\Http\Request;  
use Illuminate\Support\Facades\Auth;  

class DashboardController extends Controller  
{  
    public function index()  
    {  
        $empresa_id = Auth::check() ? Auth::user()->empresa_id : redirect()->route('login');  
        $empresa = Empresa::where('id', $empresa_id)->first();  
        $user = Auth::user();  

        // Obtener el local del usuario actual  
        $local_usuario = Local::find($user->local_id);  

        // Inicializar variables generales  
        $total_local = Local::count();  
        $total_users = User::count();  
        $total_productos = Producto::count();  
        $total_provehedors = Provehedor::count();  
        $total_compras = Compra::count();  
        $total_clientes = Cliente::count();  
        $total_ventas = Venta::count();  

        // Inicializar variable para la información de los locales  
        $locales_info = [];  

        // Verificar el rol del usuario  
        if ($user->rol != 'operador') {  
            // Si no es un operador, obtener todos los locales de la empresa que contengan "Centro" en su nombre  
            $locales = Local::where('empresa_id', $empresa_id)  
                            ->where('nombre', 'like', '%Centro%')  
                            ->get();  

            foreach ($locales as $local) {  
                $total_productos_local = Inventario::where('local_id', $local->id)->count();  
                $total_ventas_local = Venta::where('local_id', $local->id)->count();  

                $locales_info[$local->id] = [  
                    'local' => $local,  
                    'total_productos' => $total_productos_local,  
                    'total_ventas' => $total_ventas_local,  
                ];  
            }  
        }  

        return view('modulos.dashboard.home', compact(  
            'total_local',  
            'total_users',  
            'total_productos',  
            'total_provehedors',  
            'total_compras',  
            'total_clientes',  
            'total_ventas',  
            'empresa',  
            'locales_info',  
            'local_usuario' // Pasar el local del usuario a la vista  
        ));  
    }  
}  
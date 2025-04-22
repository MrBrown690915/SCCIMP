<?php  

namespace App\Exports;  

use App\Models\Producto;  
use Illuminate\Contracts\View\View;  
use Maatwebsite\Excel\Concerns\FromView;  
use Maatwebsite\Excel\Concerns\WithHeadings;  
use Maatwebsite\Excel\Concerns\WithColumnFormatting;  
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;  

class ProductoExport implements FromView, WithHeadings, WithColumnFormatting  
{  
    protected $productos;  

    public function __construct($productos)  
    {  
        $this->productos = $productos;  
    }  

    public function view(): View  
    {  
        return view('modulos.exports.productos', [ // Asegúrate de que este archivo exista  
            'productos' => $this->productos,  
        ]);  
    }  

    public function headings(): array  
    {  
        return [  
            'No',  
            'Nombre',  
            'Código',  
            'Cantidad',  
            'Precio',  
        //    'Activo',  
        ];  
    }  

    public function columnFormats(): array  
    {  
        return [  
            'E' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1, // Formato para la columna de precio  
        ];  
    }  
}  
<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = file_get_contents(database_path('categories.json'));  
        $categorias = json_decode($json, true); // Decodifica el JSON a un array  
    
        foreach ($categorias as $category) {  
            Categoria::create($category);  
        }  
    }
}

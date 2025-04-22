<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Categoria;
use App\Models\Empresa;
use App\Models\Local;
use App\Models\Provehedor;
use App\Models\Medida;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        Empresa::factory()->create([
            'nombre' => 'Empresa de Correos Artemisa',
            'nit' => '22700',
            'email' => 'direccion@art.correos.cu',
        ]);
        
        Local::factory()->create([
            'nombre' => 'Direccion de Comunicaciones',
            'cp' => '33800',
            'email' => 'carlos.mc@art.correos.cu',
            'empresa_id' => '1',
        ]);

        User::factory()->create([
            'name' => 'Administrador',
            'email' => 'admin@art.correos.cu',
            'password' => Hash::make('Administrador'),
            'rol' => 'admin',
            'empresa_id' => '1',
            'local_id' => '1',
        ]);

        $this->call([
            CategoriaSeeder::class,
            ProductoSeeder::class,
            ProvSeeder::class,
            ClienteSeeder::class,
            TarifaSeeder::class,
            //aqui van otros
        ]);
    }
}

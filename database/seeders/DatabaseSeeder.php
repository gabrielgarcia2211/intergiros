<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(Tipos\TipoEntidadSeeder::class);
        $this->call(Tipos\TipoMonedaSeeder::class);
        $this->call(Formularios\TipoFormularioSeeder::class);
        $this->call(Users\RolSeeder::class);
        $this->call(Users\UserSeeder::class);
        $this->call(Tipos\TasaCambioSeeder::class);
        $this->call(Tipos\EstadoSeeder::class);
        //$this->call(Formularios\FormularioSeeder::class);
    }
}

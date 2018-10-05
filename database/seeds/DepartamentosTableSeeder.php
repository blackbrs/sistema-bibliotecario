<?php

use Illuminate\Database\Seeder;

use App\Departamento;

class DepartamentosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Departamento::create([
            'id' => 'SV-AH',
            'nDepartamento' => 'Ahuachapán'
            ]);
        Departamento::create([
            'id' => 'SV-CA',
            'nDepartamento' => 'Cabañas'
            ]);
        Departamento::create([
            'id' => 'SV-CH',
            'nDepartamento' => 'Chalatenango'
            ]);
        Departamento::create([
            'id' => 'SV-CU',
            'nDepartamento' => 'Cuscatlán'
            ]);
        Departamento::create([
            'id' => 'SV-LI',
            'nDepartamento' => 'La Libertad'
            ]);
        Departamento::create([
            'id' => 'SV-PA',
            'nDepartamento' => 'La Paz'
            ]);
        Departamento::create([
            'id' => 'SV-UN',
            'nDepartamento' => 'La Unión'
            ]);
        Departamento::create([
            'id' => 'SV-MO',
            'nDepartamento' => 'Morazán'
            ]);
        Departamento::create([
            'id' => 'SV-SM',
            'nDepartamento' => 'San Miguel'
            ]);
        Departamento::create([
            'id' => 'SV-SS',
            'nDepartamento' => 'San Salvador'
            ]);
        Departamento::create([
            'id' => 'SV-SV',
            'nDepartamento' => 'San Vicente'
            ]);
        Departamento::create([
            'id' => 'SV-SA',
            'nDepartamento' => 'Santa Ana'
            ]);
        Departamento::create([
            'id' => 'SV-SO',
            'nDepartamento' => 'Sonsonate'
            ]);
        Departamento::create([
            'id' => 'SV-US',
            'nDepartamento' => 'Usulután'
            ]);
        
    }
}

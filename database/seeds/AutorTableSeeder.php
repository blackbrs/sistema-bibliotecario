<?php

use Illuminate\Database\Seeder;

use App\Autor;

class AutorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Autor::create([
            'id' => '1',
            'nombres'=> 'xdxdxd',
            'apellidos'=> 'dxdxdx'
        ]);
    }
    
}
<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Role;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Biblioteca;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Biblioteca::create([
            'nombreBiblioteca'=>'Biblioteca Nacional',
            'direccion'=>'Centro de san salvador',
            'telefono'=>'23456789',
            'nombreEncargado'=>'Guillermo Cornejo'
        ]);

        User::create([
            'nombres'       =>'Guillermo Alexander',
            'apellidos'     =>'Cornejo Argueta',
            'nacimiento'    =>'18-01-96',
            'sexo'          =>'Masculino',
            'Npadres'       =>'Elsa Nury',
            'miembroActivo' =>'false',
            'penitencia'    =>'false',
            'telefono'      =>'22322009',
            'email'         =>'guillermobrs@gmail.com',
            'municipio_id'     =>'3',
            'biblioteca_id'=>'1',
            'password'      =>bcrypt('admin1234')
        ]);

        Role::create([
            'name'      =>'Admin',
            'slug'      =>'admin',
            'special'   =>'all-access'

        ]);

        DB::table('role_user')->insert([
            'role_id'=>'1',
            'user_id'=>'1'
        ]);
       
        factory(User::class,1050)->create();
        
    }
}

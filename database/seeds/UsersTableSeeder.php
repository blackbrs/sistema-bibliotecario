<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Role;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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
            'password'      =>bcrypt('admin1234')
        ]);

        Role::create([
            'name'      =>'Admin',
            'slug'      =>'admin',
            'special'   =>'all-access'

        ]);
    }
}

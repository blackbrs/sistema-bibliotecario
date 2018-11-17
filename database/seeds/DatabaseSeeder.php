<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {  
        $this->call(PermissionsTableSeeder::class);
        $this->call(DepartamentosTableSeeder::class);
        $this->call(MunicipiosTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(AutorTableSeeder::class);
        
    }
}

<?php

use Illuminate\Database\Seeder;
use App\Municipio;
class MunicipiosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Municipio::create([
        'dep_id' => 'SV-SS',
        'nMunicipio' => 'San Salvador'
        ]);
    }
}

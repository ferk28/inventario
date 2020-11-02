<?php

use Illuminate\Database\Seeder;
use App\Area;
class AreasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Area::create([
            'name' => 'INSAI',
            'phone' => '1234567890',
            'extension' => '1234',
        ]);
        Area::create([
            'name' => 'Maxiproyectos',
            'phone' => '1234567890',
            'extension' => '1234',
        ]);
        Area::create([
            'name' => 'SIGMA',
            'phone' => '1234567890',
            'extension' => '1234',
        ]);
        Area::create([
            'name' => 'LTSE-Queretaro',
            'phone' => '1234567890',
            'extension' => '1234 ',
        ]);

    }
}


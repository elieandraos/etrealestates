<?php

use App\Models\Area;
use Illuminate\Database\Seeder;

class AreasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Area::updateOrCreate(['name' => 'Beirut']);
        Area::updateOrCreate(['name' => 'Baabda']);
        Area::updateOrCreate(['name' => 'El Metn']);
        Area::updateOrCreate(['name' => 'Kesrouane']);
        Area::updateOrCreate(['name' => 'Jbeil']);
        Area::updateOrCreate(['name' => 'Batroun']);
    }
}

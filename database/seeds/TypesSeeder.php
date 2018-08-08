<?php

use App\Models\Type;
use Illuminate\Database\Seeder;

class TypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Type::updateOrCreate(['name' => 'Apartment']);
        Type::updateOrCreate(['name' => 'Villa']);
        Type::updateOrCreate(['name' => 'Chalet']);
        Type::updateOrCreate(['name' => 'Shop']);
        Type::updateOrCreate(['name' => 'Office']);
        Type::updateOrCreate(['name' => 'Land']);
    }
}

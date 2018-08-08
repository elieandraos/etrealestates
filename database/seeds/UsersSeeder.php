<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::updateOrCreate([
        	'email' => 'elie@etrealestates.com'
        ], [
        	'first_name' => 'Elie',
        	'last_name' => 'Tarabay',
        	'password' => bcrypt('et2018'),
        ]);

         User::updateOrCreate([
        	'email' => 'toufic@etrealestates.com'
        ],[
        	'first_name' => 'Toufic',
        	'last_name' => 'Ghanem',
        	'password' => bcrypt('et2018'),
        ]);
    }
}

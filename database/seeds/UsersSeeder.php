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
        	'email' => 'toufic@rgrealestate.me'
        ],[
        	'first_name' => 'Toufic',
        	'last_name' => 'Ghanem',
        	'password' => bcrypt('123456'),
        ]);
    }
}

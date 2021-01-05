<?php

use Illuminate\Database\Seeder;
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
            'name' => 'Fernando Perez',
            'email' => 'ferk.28@hotmail.com',
            'password' => bcrypt('12345678'),
            'phone' => '7751807255',
            'no_control' => '2828',
            'role' => 'admin'
        ]);
    }
}

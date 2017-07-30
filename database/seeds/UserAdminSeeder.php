<?php

use Illuminate\Database\Seeder;

class UserAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'username' => 'johnchrisdc',
            'firstname' => "John Chris",
            'lastname' => "Dela Cruz",
            'email' => 'johnchrisdelacruz@gmail.com',
            'password' => bcrypt('aaaaaaaa'),
            'is_admin' => true,
        ]);
    }
}

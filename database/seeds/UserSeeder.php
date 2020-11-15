<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@admin.ru',
            'password' => Hash::make('123'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'is_admin' => true,
            'created_at' => now(),
            'updated_at' => now()
        ]);

    }
}

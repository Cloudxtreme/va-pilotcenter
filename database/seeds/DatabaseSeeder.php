<?php

use App\User;
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
        factory(User::class)->create([
            'email' => "admin@myva.com",
            'password' => password_hash("test1234", PASSWORD_BCRYPT)
        ]);
    }
}

<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $defaultTestUser = (string)"testuser";

        if(User::where('username', '=', $defaultTestUser)->get()->isEmpty()) {
            DB::table('users')->insert([
                    'username'       => $defaultTestUser,
                    'password'       => bcrypt('secret'),
                    'email'          => (string)"{$defaultTestUser}@example.com",
                    'activated'      => 1,
                    'isReal'         => (string)0,
                    'remember_token' => str_random(10),
                    'created_at'     => date("Y-m-d H:i:s"),
            ]);
        }

        factory(User::class, 5)->create();
    }
}

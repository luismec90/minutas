<?php

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
        factory('App\User')
            ->create([
                'name' => 'Luis Montoya',
                'email' => 'luismec90@gmail.com',
                'password' =>  bcrypt('minutas321'),
            ]);

        factory('App\User')
            ->create([
                'name' => 'Luisa Suarez',
                'email' => 'psicologacognitivaluisa@gmail.com',
                'password' =>  bcrypt('minutas321'),
            ]);

    }
}

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
        $users[] = [
            'name' => 'Producer',
            'email' => 'producer@producer.com',
            'password' => bcrypt('producer'),
            'profile_type' => 'producer'
        ];

        $users[] = [
            'name' => 'Laboratório',
            'email' => 'laboratory@laboratory.com',
            'password' => bcrypt('laboratory'),
            'profile_type' => 'laboratory'
        ];

        $users[] = [
            'name' => 'Transportadora',
            'email' => 'transport@transport.com',
            'password' => bcrypt('transport'),
            'profile_type' => 'transport'
        ];

        $users[] = [
            'name' => 'Indústria',
            'email' => 'industry@industry.com',
            'password' => bcrypt('industry'),
            'profile_type' => 'industry'
        ];

        \App\User::insert($users);

    }
}

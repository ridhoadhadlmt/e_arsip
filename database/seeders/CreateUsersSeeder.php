<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
               'username'=>'admin1',
               'name'=>'Admin User',
               'email'=>'admin@gmail.com',
               'role'=>1,
               'workunit_id'=>0,
               'password'=> bcrypt('12345678'),
            ],
            [
               'username'=>'operator1',
               'name'=>'Operator User',
               'email'=>'operator@gmail.com',
               'role'=>2,
               'workunit_id'=>1,
               'password'=> bcrypt('12345678'),
            ],

        ];

        foreach ($users as $key => $user) {
            User::create($user);
        }
    }
}

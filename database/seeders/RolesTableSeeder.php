<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::insert([
           ['slug' => 'admin', 'name' => 'Админ'],
            ['slug' => 'user', 'name' => 'Пользователь']
        ]);
    }
}

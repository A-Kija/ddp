<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        DB::table('users')->insert([
            'name' => 'Bebras',
            'email' => 'bebras@gmail.com',
            'password' => Hash::make('123'),
        ]);

        // CATS
        $cats = ['Užkandžiai', 'Desertai', 'Kitos prekės', 'Gėrimai'];
        foreach ($cats as $cat) {
            DB::table('cats')->insert([
                'title' => $cat,
            ]);
        }



        
    }
}

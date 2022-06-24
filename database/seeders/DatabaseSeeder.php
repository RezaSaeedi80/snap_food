<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Food;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        \App\Models\User::factory()->create([
            'name' => 'Reza',
            'email' => 'mohammadrezasaeedi8295@gmail.com',
            'is_admin' => true,
            'role' => 'seller',
            'password' => Hash::make('password')
        ]);

        $this->call(FoodSeeder::class);

        Category::create([
            'name' => 'pizza',
            'type' => 'food'
        ]);

        Category::create([
            'name' => 'seafood',
            'type' => 'resturant'
        ]);

        Category::create([
            'name' => 'itallian food',
            'type' => 'food'
        ]);


        \App\Models\User::factory(10)->create();

    }
}

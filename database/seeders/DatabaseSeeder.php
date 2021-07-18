<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Movie;
use App\Models\User;
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
        User::truncate();
        Category::truncate();
        Movie::truncate();

        User::factory()->create([
            'email' => 'admin@example.com',
            'password' => Hash::make('Kumanovo1.'),
            'api_token' => 'PFhy4Y3GjPrWE4JpLupaWiQHQwZeS3H2gi4pamTOG40tSjZ2qMX9bHvDA8uugM4XF3tL7E7EVGrKsRcO',
        ]);
        User::factory(10)->create();

        Category::factory(10)->create();

        Movie::factory(100)->create();

    }
}

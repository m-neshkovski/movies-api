<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Movie;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::truncate();
        // Category::truncate();
        // Movie::truncate();

        User::factory()->create([
            'email' => 'admin@example.com',
            'api_token' => 'PFhy4Y3GjPrWE4JpLupaWiQHQwZeS3H2gi4pamTOG40tSjZ2qMX9bHvDA8uugM4XF3tL7E7EVGrKsRcO',
            'is_admin' => true,
        ]);

        User::factory()->create([
            'email' => 'user@example.com',
        ]);

        User::factory(10)->create();

        Category::factory(10)->create();

        for($i=0; $i<100 ;$i++) {
            $categories = Category::inRandomOrder()->limit(3)->get();

            Movie::factory()
            ->hasAttached($categories)
            ->create();
        }


    }
}

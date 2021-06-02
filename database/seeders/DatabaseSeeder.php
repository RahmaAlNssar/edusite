<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // make all tables is empty
        User::query()->delete();
        Category::query()->delete();
        // end


        User::factory(50)->create();
        $this->call(CategorySeeder::class);
    }
}

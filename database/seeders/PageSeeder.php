<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Page;
class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pages =
        [
            ['name' => 'index'],
            ['name' => 'aboute'],
            ['name' => 'contact'],
            ['name' => 'course'],
            ['name' => 'courses'],
  
        ];
    Page::insert($pages);
    }
}

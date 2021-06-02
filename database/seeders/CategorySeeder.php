<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories =
            [
                ['name' => 'Town Planning & Urban Design',      'slug' => 'town-planning-&-urban-design',     'order' => 1,  'is_active' => rand(0, 1)],
                ['name' => 'Architecture & Interior Design',    'slug' => 'architecture-&-interior-design',   'order' => 2,  'is_active' => rand(0, 1)],
                ['name' => 'Garden & Landscape Design',         'slug' => 'garden-&-landscape-design',        'order' => 3,  'is_active' => rand(0, 1)],
                ['name' => 'Exhibition Design',                 'slug' => 'exhibition-design',                'order' => 4,  'is_active' => rand(0, 1)],
                ['name' => 'Product Design',                    'slug' => 'product-design',                   'order' => 5,  'is_active' => rand(0, 1)],
                ['name' => 'Packaging Design',                  'slug' => 'packaging-design',                 'order' => 6,  'is_active' => rand(0, 1)],
                ['name' => 'Graphic Design',                    'slug' => 'graphic-design',                   'order' => 7,  'is_active' => rand(0, 1)],
                ['name' => 'Corporate Identity',                'slug' => 'corporate-identity',               'order' => 8,  'is_active' => rand(0, 1)],
                ['name' => 'Brand',                             'slug' => 'brand',                            'order' => 9,  'is_active' => rand(0, 1)],
                ['name' => 'IT & Multimedia Design',            'slug' => 'it&-multimedia-design',            'order' => 10, 'is_active' => rand(0, 1)],
                ['name' => 'Textile & Fashion Design',          'slug' => 'textile&-fashion-design',          'order' => 11, 'is_active' => rand(0, 1)],
                ['name' => 'Furniture Design',                  'slug' => 'furniture-design',                 'order' => 12, 'is_active' => rand(0, 1)],
            ];
        Category::insert($categories);
    }
}

<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags =
            [
                ['name' => 'wordpress',  'slug' => 'wordpress',          'icon' => 'fab fa-wordpress'],
                ['name' => 'codepen',    'slug' => 'codepen',            'icon' => 'fab fa-codepen'],
                ['name' => 'drupal',     'slug' => 'drupal',             'icon' => 'fab fa-drupal'],
                ['name' => 'pinterest',  'slug' => 'pinterest',          'icon' => 'fab fa-pinterest'],
                ['name' => 'html',       'slug' => 'html',               'icon' => 'fab fa-html5'],
                ['name' => 'pdf',        'slug' => 'pdf',                'icon' => 'fas fa-file-pdf'],
                ['name' => 'word',       'slug' => 'word',               'icon' => 'fas fa-file-word'],
                ['name' => 'excel',      'slug' => 'excel',              'icon' => 'fas fa-file-excel'],
                ['name' => 'powerpoint', 'slug' => 'powerpoint',         'icon' => 'fas fa-file-powerpoint'],
                ['name' => 'chrome',     'slug' => 'chrome',             'icon' => 'fab fa-chrome'],
                ['name' => 'firefox',    'slug' => 'firefox',            'icon' => 'fab fa-firefox-browser'],
                ['name' => 'safari',     'slug' => 'safari',             'icon' => 'fab fa-safari'],
                ['name' => 'opera',      'slug' => 'opera',              'icon' => 'fab fa-opera'],
                ['name' => 'IE',         'slug' => 'internet-explorer',  'icon' => 'fab fa-internet-explorer'],
                ['name' => 'css',        'slug' => 'css',                'icon' => 'fab fa-css3'],
                ['name' => 'js',         'slug' => 'js',                 'icon' => 'fab fa-js-square'],
                ['name' => 'vue.js',     'slug' => 'vue.js',             'icon' => 'fab fa-vuejs'],
                ['name' => 'php',        'slug' => 'php',                'icon' => 'fab fa-php'],
                ['name' => 'laravel',    'slug' => 'laravel',            'icon' => 'fab fa-laravel'],
                ['name' => 'mysql',      'slug' => 'mysql',              'icon' => 'fas fa-database'],
            ];
        Tag::insert($tags);
    }
}

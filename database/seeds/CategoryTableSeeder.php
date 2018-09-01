<?php

use Illuminate\Database\Seeder;
use Compass\Models\Categories;

/**
 * Class CategoryTableSeeder
 */
class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @param  Categories The resource model for the category storage
     * @return void
     */
    public function run(Categories $categories): void
    {
        foreach ($categories->getDefaultCategories() as $category) {
            $findAttributes   = ['name' => $category['name']]; 
            $createAttributes = ['color' => $category['color'], 'type' => $category['type'], 'name' => $category['name']];

            $categories->firstOrCreate($findAttributes, $createAttributes);
        }
    }
}

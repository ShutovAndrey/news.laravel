<?php

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
        $category = [
            [
                "name" => "Спорт",
                "category_url"=>"sport"
            ],
            [
                "name" => "Политика",
                "category_url"=>"politics"
            ]
        ];
        DB::table('categories')->insert($category);
    }
}

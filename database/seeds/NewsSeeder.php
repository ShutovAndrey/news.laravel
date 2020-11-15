<?php

use Illuminate\Database\Seeder;
use App\News;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(News::class, 10)->create();

    }

}

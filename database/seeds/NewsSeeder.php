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
     //  DB::table('news')->insert($this->getData());
    }

    /*private function getData(){
        $faker=Faker\Factory::create('ru_RU');
        $data=[];
        for ($i=0;$i<10;$i++){
        $data[]=[
            'title'=>$faker->sentence(rand(3,6)),
            'text'=>$faker->realText(rand(300,800)),
            'private'=>$faker->boolean,
            'image' => null
        ];
        }
        return $data;
    }*/
}

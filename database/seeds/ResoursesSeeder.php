<?php

use Illuminate\Database\Seeder;

class ResoursesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $resourses = [
          //  ["name" => "https://www.rt.com/rss",],
          //  ["name" => "https://regnum.ru/rss",],
         //   ["name" => "https://lenta.ru/rss/news",],
         //   ["name" => "https://news.yandex.ru/auto.rss",],
            ["name" => "https://rss.newsru.com/russia",],
            ["name" => "https://rss.newsru.com/world",],
         //   ["name" => "https://news.yandex.ru/auto.rss",],
          //  ["name" => "https://news.yandex.ru/auto.rss",],
         //   ["name" => "https://news.yandex.ru/auto_racing.rss",],
         //   ["name" => "https://news.yandex.ru/army.rss",],
         //   ["name" => "https://news.yandex.ru/gadgets.rss",],
        //    ["name" => "https://news.yandex.ru/index.rss",],
        //    ["name" => "https://news.yandex.ru/martial_arts.rss",],
         //   ["name" => "https://news.yandex.ru/communal.rss",],
         //   ["name" => "https://news.yandex.ru/health.rss",],
         //   ["name" => "https://news.yandex.ru/games.rss",],
         //   ["name" => "https://news.yandex.ru/internet.rss",],
          //  ["name" => "https://news.yandex.ru/cyber_sport.rss",],
        ];

        DB::table('parsing_resourses')->insert($resourses);
    }
}

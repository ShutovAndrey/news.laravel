<?php
namespace App\Services;

use App\News;
use App\Category;
use Orchestra\Parser\Xml\Facade as XmlParser;
use Illuminate\Support\Str;

class XMLParserService
{

    public function saveNews($link) {
        $xml = XmlParser::load($link);

        $data = $xml->parse([
            'title' => ['uses' => 'channel.title'],
            'link' => ['uses' => 'channel.link'],
            'description' => ['uses' => 'channel.description'],
            'image' => ['uses' => 'channel.image.url'],
            'news' => ['uses' => 'channel.item[guid,title,link,description,category,pubDate,enclosure::url]']
        ]);

        foreach ($data['news'] as $news) {
            if (!$news['description']){
                unset($news);
                continue;  //в одном из ресурсов у меня такое попадалось,
                // вообще наверное полезно все поля из fillable проверять, чтобы ошибки не вылетали
            }
            if (!$news['category']) {
                $categoryName = $data['title'];
            } else {
                $categoryName = $news['category'];
            }


            $category = Category::query()->firstOrCreate([
                'name' => $categoryName,
                'category_url' => Str::slug($categoryName)
            ]);

            News::query()->firstOrCreate([
                'title' => $news['title'],
                'text' => $news['description'],
                'private' => false,
                'image' => $news['enclosure::url'],
                'category_id' => $category->id,
            ]);

        }
    }

}

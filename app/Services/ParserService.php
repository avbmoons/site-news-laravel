<?php

declare(strict_types=1);

namespace App\Services;

use App\Enums\NewsStatus;
use App\Models\Category;
use App\Models\News;
use App\Services\Contracts\Parser;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Orchestra\Parser\Xml\Facade as XmlParser;

class ParserService implements Parser
{
    private string $link;

    public function setLink(string $link): self
    {
        $this->link = $link;

        return $this;
    }

    public function getParseData(): array
    {
        $xml = XMLParser::load($this->link);

        return $xml->parse([
            'title' => [
                'uses' => 'channel.title'
            ],
            'link' => [
                'uses' => 'channel.link'
            ],
            'description' => [
                'uses' => 'channel.description'
            ],
            'image' => [
                'uses' => 'channel.url'
            ],
            'news' => [
                'uses' => 'channel.item[title,link,guid,description,pubDate,author]'
            ],
        ]);
    }

    public function saveParseData(): void
    {
        $xml = XMLParser::load($this->link);

        $data = $xml->parse([
            'title' => [
                'uses' => 'channel.title'
            ],
            'link' => [
                'uses' => 'channel.link'
            ],
            'description' => [
                'uses' => 'channel.description'
            ],
            'image' => [
                'uses' => 'channel.url'
            ],
            'news' => [
                'uses' => 'channel.item[title,link,author,description,pubDate,category]'
            ],
        ]);

        foreach ($data['news'] as $news) {
            $e = \explode("/", $this->link);
            $slug = end($e);
            (int)$categoryId = Category::find($slug, ['id']);
            echo ("categoryId=" . $categoryId);

            $news[] = News::create([
                'title' => $news['title'],
                'author' => $news['author'],
                'description' => $news['description'],
                'created_at' => $news['pubDate'],
                'status' => NewsStatus::DRAFT->value,
                'category' => $categoryId->categories()->attach($categoryId), //
            ]);
        }
        DB::table('news')->insert($news);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Post
{
    public $title;
    public $excerpt;

    public $body;
    public $date;
    public $slug;

    /**
     * @param $title
     * @param $excerpt
     * @param $body
     * @param $date
     */
    public function __construct($title, $excerpt, $body, $date, $slug)
    {
        $this->title = $title;
        $this->excerpt = $excerpt;
        $this->body = $body;
        $this->date = $date;
        $this->slug = $slug;
    }

    public static function all()
    {
        return collect(File::files(resource_path("posts/")))
            ->map(fn($file) => YamlFrontMatter::parseFile($file))
            ->map(fn($document) => new Post(
                $document->matter('title'),
                $document->matter('excerpt'),
                $document->body(),
                $document->matter('date'),
                $document->matter('slug')
            ));
    }

    public static function find($slug)
    {
        // of all the blog posts, find the one with a slug that matches the one that was requested.

        return static::all()->firstWhere('slug', $slug);

    }

}

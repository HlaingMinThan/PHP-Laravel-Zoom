<?php

namespace App\Models;

use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Blog
{
    public $title;
    public $slug;
    public $body;
    public $date;

    public function __construct($title, $slug, $body, $date)
    {
        $this->title = $title;
        $this->slug = $slug;
        $this->body = $body;
        $this->date = $date;
    }
    public static function all()
    {
        $files = collect(File::files(resource_path('/blogs'))); //collection object

        return $files->map(function ($file) {
            $yamlObj = YamlFrontMatter::parse($file->getContents());
            $title = $yamlObj->title;
            $slug = $yamlObj->slug;
            $date = $yamlObj->date;
            $body = $yamlObj->body();
            return new Blog($title, $slug, $body, $date);
        })->sortByDesc('date');
    }

    public static function find($slug)
    {
        return static::all()->firstWhere('slug', $slug);
    }

    public static function findOrFail($slug)
    {
        $blog = static::find($slug);
        abort_if(!$blog, 404);
        return $blog;
    }
}

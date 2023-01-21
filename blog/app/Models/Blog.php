<?php

namespace App\Models;

use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Blog
{
    public $title;
    public $slug;
    public $body;

    public function __construct($title, $slug, $body)
    {
        $this->title = $title;
        $this->slug = $slug;
        $this->body = $body;
    }
    public static function all()
    {
        $files = File::files(resource_path('/blogs')); //[file obj, file obj]
        return array_map(function ($file) {
            $yamlObj = YamlFrontMatter::parse($file->getContents());
            $title = $yamlObj->title;
            $slug = $yamlObj->slug;
            $body = $yamlObj->body();
            return new Blog($title, $slug, $body);
        }, $files);
    }

    public static function find($filename)
    {
        $path = resource_path("/blogs/$filename.html"); //absolute path -> os -> no issue

        if (!file_exists($path)) {
            return redirect('/');
        }
        //cache concept
        return cache()->remember("posts.$filename", now()->addMinutes(2), function () use ($path) {
            return file_get_contents($path); //operation
        }); //saved in the server memory for 5 seconds
    }
}

<x-layout>
    <x-slot name="title">
        <title>CC - Blogs</title>
    </x-slot>
    <div class="container">
        @foreach($blogs as $blog)
        <article class="container">
            <h1>
                <a href="/blogs/{{$blog->slug}}">{{$blog->title}} - {{$blog->date}}</a>
            </h1>
            <p class="text-gray">{{$blog->body}}</p>
        </article>
        @endforeach
    </div>
</x-layout>
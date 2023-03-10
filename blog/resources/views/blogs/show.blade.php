<x-layout>
    <!-- single blog section -->
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto text-center">
                <img
                    src="https://creativecoder.s3.ap-southeast-1.amazonaws.com/blogs/GOLwpsybfhxH0DW8O6tRvpm4jCR6MZvDtGOFgjq0.jpg"
                    class="card-img-top"
                    alt="..."
                />
                <h3 class="my-3">{{$blog->title}}</h3>
                <div>
                    <div>Author - <a href="/?author={{$blog->author->username}}">{{$blog->author->name}}</a></div>
                    <div><a href="/categories/{{$blog->category->slug}}"><span
                                class="badge bg-primary">{{$blog->category->name}}</span></a></div>
                    <div class="text-secondary">{{$blog->created_at->diffForHumans()}}</div>
                    @auth
                    <div class="text-secondary">
                        <form
                            action="/blogs/{{$blog->slug}}/subscription"
                            method="POST"
                        >
                            @csrf
                            @if (auth()->user()->isSubscribed($blog))
                            <button
                                class="btn btn-danger"
                                type="submit"
                            >unsubscribe</button>
                            @else
                            <button
                                class="btn btn-warning"
                                type="submit"
                            >subscribe</button>
                            @endif
                        </form>
                    </div>
                    @endauth

                </div>
                <p class="lh-md mt-3">
                    {!!$blog->body !!}
                </p>
            </div>
        </div>
    </div>
    <x-comments
        :comments="$blog->comments()->paginate(5)"
        :blog="$blog"
    />
    <x-blogs_you_may_like_section :randomBlogs="$randomBlogs" />
</x-layout>
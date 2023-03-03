@props(['comments','blog'])

<section class="container">
    <div class="col-md-8  mx-auto">
        @if (auth()->check())
        <x-card>
            <form
                action="{{route('blogs.comments.store',$blog->slug)}}"
                method="POST"
            >
                @csrf
                <div class="form-group">
                    <textarea
                        placeholder="Say Something..."
                        name="body"
                        class="form-control border border-0"
                        id=""
                        cols="30"
                        rows="10"
                    ></textarea>
                </div>
                <x-error name="body" />
                <button
                    type="submit"
                    class="btn btn-primary my-3"
                >Submit</button>
            </form>
        </x-card>
        @else
        <p class="my-3">Please <a href="/login">log in</a> to participate in the discussion.</p>
        @endif
        @if ($comments->count())
        <h5 class="my-3 text-secondary">Comments ({{$comments->count()}})</h5>
        @foreach ($comments as $comment)
        <x-single-comment :comment="$comment" />
        @endforeach
        @endif

        {{$comments->links()}}
    </div>
</section>
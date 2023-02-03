@props(['blogs'])
<section
    class="container text-center"
    id="blogs"
>
    <h1 class="display-5 fw-bold mb-4">Blogs</h1>
    <div class="">
        <x-category-dropdown />
        {{-- <select
            name=""
            id=""
            class="p-1 rounded-pill mx-3"
        >
            <option value="">Filter by Tag</option>
        </select> --}}
    </div>
    <form
        action="/"
        method="GET"
        class="my-3"
    >
        <div class="input-group mb-3">
            <input
                name="search"
                value="{{request('search')}}"
                type="text"
                autocomplete="false"
                class="form-control"
                placeholder="Search Blogs..."
            />
            <button
                class="input-group-text bg-primary text-light"
                id="basic-addon2"
                type="submit"
            >
                Search
            </button>
        </div>
    </form>
    <div class="row">
        @forelse ($blogs as $blog)
        <div class="col-md-4 mb-4">
            <x-blog-card :blog="$blog" />
        </div>
        @empty
        <p>There is no blogs for that search value.</p>
        @endforelse
        {{$blogs->links()}}
    </div>
</section>
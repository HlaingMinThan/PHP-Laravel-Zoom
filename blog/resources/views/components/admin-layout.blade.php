<x-layout>
    <div class="container">
        <div class="row">
            <div class="col-md-4 my-3">
                <ul class="list-group">
                    <li class="list-group-item">
                        <a href="">Blogs</a>
                    </li>
                    <li class="list-group-item">
                        <a href="/admin/blogs/create">Blog Create</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-8">
                {{$slot}}
            </div>
        </div>
    </div>
</x-layout>
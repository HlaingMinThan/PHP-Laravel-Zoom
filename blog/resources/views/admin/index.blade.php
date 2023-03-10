<x-admin-layout>
    <h1>All Blogs</h1>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">intro</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($blogs as $blog)
            <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td>{{$blog->title}}</td>
                <td>{{$blog->intro}}</td>
                <td class="d-flex">
                    <button class="btn btn-warning mx-2">Edit</button>
                    <form
                        action="/admin/blogs/{{$blog->id}}"
                        method="POST"
                    >
                        @csrf
                        @method('delete')
                        <button
                            class="btn btn-danger"
                            type="submit"
                        >delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{$blogs->links()}}
</x-admin-layout>
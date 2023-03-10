<x-admin-layout>
    <h1 class="text-center">Blog Create Form</h1>
    <form
        class="mx-auto p-5"
        method="POST"
        action="/admin/blogs"
        enctype="multipart/form-data"
    >
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Title</label>
            <input
                name="title"
                type="text"
                class="form-control"
                id="exampleInputEmail1"
                aria-describedby="emailHelp"
                placeholder="Enter Title"
            >
            <x-error name="title" />
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Slug</label>
            <input
                name="slug"
                type="text"
                class="form-control"
                id="exampleInputEmail1"
                aria-describedby="emailHelp"
                placeholder="Enter Slug"
            >
            <x-error name="slug" />
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Photo</label>
            <input
                name="photo"
                type="file"
                class="form-control"
            >
            <x-error name="photo" />
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Intro</label>
            <input
                name="intro"
                type="text"
                class="form-control"
                id="exampleInputEmail1"
                aria-describedby="emailHelp"
                placeholder="Enter Intro"
            >
            <x-error name="intro" />
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Body</label>
            <textarea
                id="summernote"
                name="body"
                id=""
                cols="30"
                rows="10"
                class="form-control"
            ></textarea>
            <x-error name="body" />
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Category</label>
            <select
                class="form-control"
                name="category_id"
                id=""
            >
                @foreach ($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
            <x-error name="category_id" />
        </div>

        <button
            type="submit"
            class="btn btn-primary my-2"
        >Submit</button>
    </form>
</x-admin-layout>
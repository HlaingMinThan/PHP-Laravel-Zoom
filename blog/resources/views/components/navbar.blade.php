<nav class="navbar navbar-dark bg-dark">
    <div class="container">
        <a
            class="navbar-brand"
            href="/"
        >Creative Coder</a>
        <div class="d-flex">
            <a
                href="/"
                class="nav-link"
            >{{auth()->user()?->name}}</a>
            <a
                href="/"
                class="nav-link"
            >Home</a>
            @can('admin')
            <a
                href="/admin"
                class="nav-link"
            >Dashboard</a>
            @endcan
            <a
                href="/#blogs"
                class="nav-link"
            >Blogs</a>

            @if (auth()->check())
            <form
                action="/logout"
                method="POST"
            >
                @csrf
                <button
                    type="submit"
                    class="nav-link btn btn-link"
                >Logout</button>
            </form>
            @else
            <a
                href="/register"
                class="nav-link"
            >Register</a>
            <a
                href="/login"
                class="nav-link"
            >Log in</a>

            @endif
        </div>
    </div>
</nav>
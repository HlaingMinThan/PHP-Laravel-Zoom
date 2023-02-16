<x-layout>
    <div
        class="container"
        style="height:75vh;"
    >
        <div class="row">
            <div class="col-md-5 mx-auto">
                <h3 class="text-primary text-center my-2">Login form</h3>
                <div class="card p-4 my-3 shadow-sm">
                    <form
                        method="POST"
                        action="/login"
                    >
                        @csrf
                        <div class="mb-3">
                            <label
                                for="exampleInputEmail1"
                                class="form-label"
                            >Email address</label>
                            <input
                                type="email"
                                name="email"
                                value="{{old('email')}}"
                                class="form-control"
                                id="exampleInputEmail1"
                                aria-describedby="emailHelp"
                            >
                            <x-error name="email" />
                        </div>
                        <div class="mb-3">
                            <label
                                for="exampleInputPassword1"
                                class="form-label"
                            >Password</label>
                            <input
                                type="password"
                                name="password"
                                class="form-control"
                                id="exampleInputPassword1"
                            >
                            <x-error name="password" />
                        </div>
                        <button
                            type="submit"
                            class="btn btn-primary"
                        >Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>
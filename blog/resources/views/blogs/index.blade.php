<x-layout>
    {{-- flash message --}}
    @if (session('success'))
    <div
        class="alert alert-success"
        role="alert"
    >
        {{session('success')}}
    </div>
    @endif
    <x-hero />
    <x-blogs-section :blogs="$blogs" />
</x-layout>
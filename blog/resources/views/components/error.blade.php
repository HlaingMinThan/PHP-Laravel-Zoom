@props(['name'])

@error($name)
<p class="text-danger my-2">{{$message}}</p>
@enderror
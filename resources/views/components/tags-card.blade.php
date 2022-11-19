@props(["tags"])

@php
    $tags = explode(",",$tags);
@endphp
<div class="px-6 pt-4 pb-2">
    @foreach($tags as $tag)
        <a href="{{route("index",["tag" => $tag])}}" class="inline-block cursor-pointer bg-gray-300 rounded-full px-4 py-1 text-lg font-semibold text-gray-700 mr-2 mb-2">#{{$tag}}</a>
    @endforeach
</div>

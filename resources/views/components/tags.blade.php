@props(["tags"])

@foreach($tags as $tag)

    @php
        $tag = explode(",",$tag->name);
    @endphp

    @foreach($tag as $item)
        <a href="{{route("index",["tag" => $item])}}"
           class="inline-block cursor-pointer bg-gray-300 rounded-full px-4 py-1 text-lg font-semibold text-gray-700 mr-2 mb-2">
            #{{$item}}
        </a>
    @endforeach

@endforeach

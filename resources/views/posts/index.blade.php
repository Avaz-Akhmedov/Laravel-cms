<x-layout>


    <section class="min-h-screen bg-[#BEC9DE] w-full flex flex-col gap-4">
        @include("includes._search")


        <div class="mt-16 w-full h-[70px] flex items-center justify-center gap-4">
            @foreach($categories->unique("name") as $category)
                <a href="{{route("index",["category" => $category->name])}}"
                   class="inline-block cursor-pointer bg-gray-700 text-center  rounded-full px-4 py-1 text-lg font-semibold text-white mr-2 mb-2 hover:text-gray-700 hover:bg-white">
                    {{$category->name}}
                </a>
            @endforeach
        </div>



        <main class="lg:grid lg:grid-cols-3 place-items-center gap-4 space-y-4 md:space-y-0 ">

            @foreach($posts as $post)

                <div data-aos="fade-up" class="max-w-sm rounded overflow-hidden bg-white">
                    <img loading="lazy" class="w-full"
                         src="{{$post->image ? asset($post->image) : asset("images/demo.jpg")}}" alt="{{$post->title}}">
                    <div class="px-6 py-4">
                        <div class="font-bold text-2xl font-bold cursor-pointer mb-2 text-blue-800 hover:underline">
                            <a href="{{route("post.show",$post->id)}}">{{$post->title}}</a>
                        </div>
                        <p class="text-black line-clamp-4 font-semibold text-base">
                            {!! $post->content !!}
                        </p>
                    </div>


                    <div class="px-6 pt-4 pb-2">

                        <x-tags :tags="$post->tags"></x-tags>

                    </div>

                </div>

            @endforeach
        </main>


    </section>


</x-layout>

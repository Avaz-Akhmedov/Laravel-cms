<x-layout>


    <section class="min-h-screen bg-[#BEC9DE] w-full flex items-center justify-center">

        <main class="lg:grid lg:grid-cols-3 gap-4 space-y-4 md:space-y-0 pt-16 ">

            @foreach($posts as $post)

                <div data-aos="fade-up" class="max-w-sm rounded overflow-hidden bg-white">
                    <img class="w-full" src="{{$post->image ? asset($post->image) : asset("images/demo.jpg")}}" alt="{{$post->title}}">
                    <div class="px-6 py-4">
                        <div class="font-bold text-2xl font-bold cursor-pointer mb-2 text-blue-800 hover:underline">
                            <a href="">{{$post->title}}</a>
                        </div>
                        <p class="text-black font-semibold text-base">
                            {{substr($post->content,0,200),"...."}}
                        </p>
                    </div>


                    @php
                        $tags = explode(",",$post->tags);
                    @endphp
                    <div class="px-6 pt-4 pb-2">
                        @for($i = 0; $i < count($tags); $i++)
                            <span class="inline-block cursor-pointer bg-gray-300 rounded-full px-4 py-1 text-lg font-semibold text-gray-700 mr-2 mb-2">#{{$tags[$i]}}</span>
                        @endfor
                    </div>

                </div>


            @endforeach
        </main>


    </section>



</x-layout>

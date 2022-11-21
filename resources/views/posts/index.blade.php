<x-layout>


    <section class="min-h-screen bg-[#BEC9DE] w-full flex items-center flex-col justify-center">

        <main class="lg:grid lg:grid-cols-3 gap-4 space-y-4 md:space-y-0 pt-36 ">
            <x-search-card />
            <x-category-card/>
        @foreach($posts as $post)

                <div data-aos="fade-up" class="max-w-sm rounded overflow-hidden bg-white">
                    <img loading="lazy" class="w-full" src="{{$post->image ? asset($post->image) : asset("images/demo.jpg")}}" alt="{{$post->title}}">
                    <div class="px-6 py-4">
                        <div class="font-bold text-2xl font-bold cursor-pointer mb-2 text-blue-800 hover:underline">
                            <a href="">{{$post->title}}</a>
                        </div>
                        <p class="text-black font-semibold text-base">
                            {{substr($post->content,0,200),"...."}}
                        </p>
                    </div>


                 <x-tags-card :tags="$post->tags"/>

                </div>


            @endforeach
        </main>


    </section>



</x-layout>

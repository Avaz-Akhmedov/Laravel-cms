<x-layout>


    <section class="w-full h-screen bg-[#BEC9DE] overflow-hidden">
        <div class="flex gap-8 justify-between items-center">

            <div class="flex flex-col gap-6  ml-14" data-aos="fade-down">
                <h1 class="text-7xl font-bold text-[#111827]">The platform for <br> creative
                    <span class="text-blue-700 relative ">
                        minds
                        <svg class="b _ j ty is ti absolute bottom-[-1] left-0 " width="220" height="24"
                             viewBox="0 0 220 24" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M134.66 13.107c-10.334-.37-20.721-.5-31.12-.291l-2.6.06c-4.116.04-8.193.602-12.3.749-14.502.43-29.029 1.196-43.514 2.465-6.414.63-12.808 1.629-19.04 2.866-7.93 1.579-16.113 3.71-23.367 5.003-2.211.374-3.397-1.832-2.31-4.906.5-1.467 1.838-3.456 3.418-4.813a16.047 16.047 0 0 1 6.107-3.365c16.88-4.266 33.763-6.67 51.009-7.389C71.25 3.187 81.81 1.6 92.309.966c11.53-.65 23.097-.938 34.66-.96 7.117-.054 14.25.254 21.36.318l16.194.803 4.62.39c3.85.32 7.693.618 11.53.813 8.346.883 16.673.802 25.144 2.159 1.864.276 3.714.338 5.566.873l.717.225c6.162 1.977 7.92 3.64 7.9 7.197l-.003.203c-.017.875.05 1.772-.112 2.593-.581 2.762-4.066 4.12-8.637 3.63-13.696-1.06-27.935-3.332-42.97-4.168-11.055-.83-22.314-1.459-33.596-1.603l-.022-.332Z"
                                fill="#1d4ed8" fill-rule="evenodd"></path>
                                    </svg>
                    </span>
                </h1>
                <p class="text-xl font-semibold">Our landing page template works on all devices, so you only have to
                    <br>
                    set it up once, and get beautiful results forever.</p>
                <div class="flex gap-12 items-center">
                    <a href="{{route("create")}}"
                       class="bg-blue-700 text-base font-bold text-white rounded-lg hover:bg-blue-800 px-10 py-2">Create
                        Post</a>
                    <a href="{{route("register")}}" class="hover:underline text-lg font-semibold">Sign up</a>
                </div>
            </div>

            <div class="mt-12 mr-[-100px]" data-aos="fade-up">
                <img class="" width="500" src="{{asset("images/hero-image.png")}}" alt="">
            </div>

        </div>
    </section>

    {{--LATEST POSTS--}}
    <section class="w-full min-h-screen flex items-center justify-center gap-16 flex-col   bg-[#1f2937] ">
        <h1 class="text-5xl text-white fon-bold" data-aos="fade-left">Recent Posts</h1>

        <article class="flex gap-4 overflow-x-hidden h-[300px] mx-6 " data-aos="fade-right">
            @foreach($posts as $post)
                <div class=" min-w-[430px] h-[300px]  px-8 py-4 mx-auto bg-gray-300 rounded-lg shadow-md ">
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-black font-semibold">{{\Carbon\Carbon::parse($post->created_at)->diffForHumans()}}</span>
                        <a class="px-3 py-1 text-sm font-bold text-gray-100 transition-colors duration-200 transform bg-black rounded cursor-pointer hover:bg-gray-500 capitalize">{{$post->category}}</a>
                    </div>
                    <div class="mt-2">
                        <a href="{{route("show",$post->id)}}" class="text-2xl font-bold text-blue-800  hover:underline">{{$post->title}}</a>
                        <p class="mt-2 text-black">{{substr($post->content,0,200),"..."}}.</p>
                    </div>
                    <div class="flex items-center justify-between mt-4">
                        <a href="#" class="text-blue-600 text-xl font-semibold hover:underline">Read
                            more ⟶</a>
                        <div class="flex items-center">
                            <a class="font-bold text-black cursor-pointer ">John Doe</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </article>


    </section>



</x-layout>




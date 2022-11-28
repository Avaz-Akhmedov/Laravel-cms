<x-layout>

    <div class="mx-4">
        <div class="bg-gray-50 border border-gray-200 p-10 rounded">
            <div class="flex flex-col items-center justify-center text-center">
                <img
                    class="w-48 mr-6 mb-6"
                    src="{{$post->image ? asset($post->image) : asset("images/demo.jpg")}}" alt="{{$post->title}}"/>

                <h3 class="text-2xl mb-2">{{$post->title}}</h3>
                <div class="text-xl  mb-4">Category:<span class="text-blue-800 font-bold capitalize">{{$post->category->name}}</span></div>


                <div class="flex gap-4">
                    <x-tags :tags="$post->tags"></x-tags>

                </div>
                <div class="text-xl my-4">
                   Posted by <span class="text-blue-800 font-bold">{{ $post->user->name }}</span>
                </div>
                <div class="border border-gray-200 w-full mb-6"></div>
                <div>
                    <h3 class="text-3xl font-bold mb-4">
                       Content of post
                    </h3>
                    <div class="text-lg space-y-6">
                        <p>
                           {{$post->content}}
                        </p>
                    </div>
                </div>
            </div>

</x-layout>

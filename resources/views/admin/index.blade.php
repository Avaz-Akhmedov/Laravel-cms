<x-layout>

    <div class="bg-white p-8 rounded-md w-full">

        <div>
            <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                    <table class="min-w-full leading-normal">
                        <thead>
                        <tr>
                            <th
                                class="px-5 py-3 text-black text-base border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Title
                            </th>
                            <th
                                class="px-5 py-3 text-black text-base border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Category
                            </th>
                            <th
                                class="px-5 py-3 text-black text-base border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Image
                            </th>
                            <th
                                class="px-5 py-3 text-black text-base border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Created_at
                            </th>
                            <th
                                class="px-5 py-3 text-black text-base border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Actions
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($posts as $post)
                        <tr>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <a href="{{route("post.show",$post->id)}}" class="text-blue-800 text-xl font-semibold hover:underline whitespace-no-wrap">{{$post->title}}</a>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <p class="text-black text-xl capitalize font-semibold whitespace-no-wrap">
                                    {{$post->category->name}}
                                </p>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0">
                                        <img loading="lazy" class=" w-[60px] rounded-full"
                                             src="{{$post->image ? asset($post->image) : asset("images/demo.jpg")}}"                                             alt="{{$post->title}}"/>
                                    </div>
                                </div>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white">
                                <p class="text-black text-xl font-semibold whitespace-no-wrap">
                                    {{\Carbon\Carbon::parse($post->created_at)->diffForHumans()}}
                                </p>
                            </td>
                            <td class="px-5  py-5 border-b border-gray-200 bg-white">
                                <div class="flex gap-4 items-center">
                                    <a href="{{route("post.edit",$post->id)}}" class="text-xl text-green-600 underline hover:text-green-800">Edit</a>

                                    <form  action="{{route("post.destroy",$post->id)}}" method="POST">
                                        @csrf
                                        @method("DELETE")
                                        <button class="text-xl text-red-600 underline hover:text-red-800">Delete</button>
                                    </form>

                                </div>

                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

</x-layout>

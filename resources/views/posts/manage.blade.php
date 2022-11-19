<x-layout>

    <div class="mx-4">
        <div class="bg-gray-50 border border-gray-200 p-10 rounded">
            <header>
                <h1
                    class="text-3xl text-center font-bold my-6 uppercase"
                >
                    Manage Posts
                </h1>
            </header>

            <table class="w-full table-auto rounded-sm">
                <tbody>
                @forelse($posts as $post)
                <tr class="border-gray-300">
                    <td
                        class="px-4 py-8 border-t border-b border-gray-300"
                    >
                        <a class="text-2xl text-blue-800 hover:underline" href="#">
                            {{$post->title}}
                        </a>
                    </td>
                    <td
                        class="px-4 py-8 border-t border-b border-gray-300 text-lg"
                    >
                        <a
                            href="{{route("post.edit",$post->id)}}"
                            class="text-blue-600 text-xl hover:underline hover:text-blue-800 px-6 py-2 rounded-xl"
                        ><i
                                class="fa-solid fa-pen-to-square"
                            ></i>
                            Edit</a
                        >
                    </td>
                    <td
                        class="px-4 py-8 border-t border-b border-gray-300 text-lg"
                    >
                        <form action="{{route("post.destroy",$post->id)}}" method="POST">
                            @csrf
                            @method("DELETE")
                            <button class="text-red-600 text-xl hover:underline hover:text-red-800">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                    <tr class="border-gray-300">
                        <td
                            class="px-4 py-8 border-t border-b border-gray-300 text-lg"
                        >
                            <p class="text-center">
                                You don't have posts yet
                            </p>
                        </td>
                @endforelse
                </tbody>
            </table>
        </div>

</x-layout>

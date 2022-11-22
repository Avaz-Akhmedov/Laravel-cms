<x-layout>

    <table class="w-full table-auto rounded-sm mt-28 ">
    @forelse($posts as $post)
        <tbody >
        <tr class="border-gray-300">
            <td class="px-4 py-8 text-blue-800  border-t border-b border-gray-300 text-lg ">
                <a href="{{route("post.show",$post->id)}}" class="text-2xl font-semibold hover:underline">
                    {{$post->title}}
                </a>
            </td>

            <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                <a href="{{route("post.edit",$post->id)}}" class="text-blue-400 px-6 py-2 rounded-xl">Edit</a>
            </td>

            <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                <form action="{{route("post.destroy",$post->id)}}" method="POST">
                    @csrf
                    @method("DELETE")
                    <button class="text-red-600">
                        Delete
                    </button>
                </form>
            </td>

        </tr>
        </tbody>
    @empty
        <tr class="border-gray-300">
            <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                <p class="text-xl font-semibold text-center">
                   This user doesn't have posts
                </p>
            </td>
            @endforelse
            </table>

</x-layout>

<x-layout>

    <table class="min-w-full mt-12 border-collapse block md:table">
        <thead class="block md:table-header-group">
        <tr class="border border-grey-500 md:border-none block md:table-row absolute -top-full md:top-auto -left-full md:left-auto  md:relative ">
            <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-center block md:table-cell">
                Name
            </th>
            <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-center block md:table-cell">
                Email Address
            </th>
            <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-center block md:table-cell">
                Registered At
            </th>
            <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-center block md:table-cell">
               Posts
            </th>
            <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-center block md:table-cell">
                Actions
            </th>
        </tr>
        </thead>
        <tbody class="block md:table-row-group">
        @foreach($users as $user)
            <tr class="bg-white border border-grey-500 md:border-none block md:table-row">
                <td class="p-2 md:border md:border-grey-500 text-center text-xl block md:table-cell"><span
                        class="inline-block w-1/3 md:hidden font-bold"></span>{{$user->name}}</td>

                <td class="p-2 md:border md:border-grey-500 text-center text-xl block md:table-cell"><span
                        class="inline-block w-1/3 md:hidden font-bold"></span>{{$user->email}}</td>

                <td class="p-2 md:border md:border-grey-500 text-center text-xl block md:table-cell">
                    <span class="inline-block w-1/3 md:hidden font-bold"></span>
                    {{\Carbon\Carbon::parse($user->created_at)->diffForHumans()}}
                </td>
                 <td class="p-2 md:border md:border-grey-500 text-center text-xl block md:table-cell">
                     <a class="text-blue-800 hover:underline" href="{{route("admin.user.posts.manage",$user->id)}}">Manage</a>
                </td>

                <td class="p-2 md:border md:border-grey-500 text-center text-xl block md:table-cell">
                    <div class="flex gap-2 justify-center">
                        <a href="{{route("admin.user.edit",$user->id)}}"
                           class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 border border-blue-500 rounded">
                            Edit
                        </a>
                        <form action="{{route("admin.user.destroy",$user->id)}}" method="POST">
                            @csrf
                            @method("DELETE")

                            <button
                                class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 border border-red-500 rounded">
                                Delete
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

</x-layout>

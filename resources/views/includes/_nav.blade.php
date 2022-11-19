<nav class="flex justify-between w-full h-[70px] px-10 items-center bg-[#BEC9DE]">

    <a href="{{route("welcome")}}" class="text-blue-800">
        <svg class="ur cv li lo la r_ rl fill-blue-800 " width="40" height="40" xmlns="http://www.w3.org/2000/svg">
            <path
                d="m7.799 4.47.325.434a19.264 19.264 0 0 0 4.518 4.204l.27.175-.013.257a17.638 17.638 0 0 1-.437 2.867l-.144.564a18.082 18.082 0 0 1-2.889 5.977c2.272.245 4.492.88 6.5 1.886 1.601.788 3.062 1.798 4.344 2.972l.142.135-.017.232a17.034 17.034 0 0 0 1.227 7.504l-.724.323c-1.555-2.931-4.113-5.287-7.19-6.632-3.075-1.351-6.602-1.622-9.857-.844-.822.194-1.532.094-2.146-.183a3.138 3.138 0 0 1-1.29-1.146l-.076-.133-.078-.154-.085-.201a2.893 2.893 0 0 1-.095-1.694c.174-.624.55-1.2 1.239-1.67 2.734-1.85 4.883-4.537 5.944-7.68.704-2.076.925-4.32.633-6.545l-.101-.647Zm4.674-.284.16.2a15.87 15.87 0 0 0 5.629 4.322c3.752 1.76 8.363 2.075 12.488.665.419-.14.78-.044 1.002.158l.106.12.066.11.026.063c.125.33.024.751-.4.994-3.404 1.905-5.92 5.05-6.98 8.573a13.967 13.967 0 0 0 .727 10.055l.241.484-.724.323c-.913-2.227-2.326-4.302-4.12-6.05l-.28-.262.026-.305a16.667 16.667 0 0 1 1.121-4.652l.206-.488c1.05-2.443 2.676-4.59 4.664-6.293-3.064.442-6.273.17-9.243-.858a19.036 19.036 0 0 1-4.072-1.93l-.204-.132.017-.322a18.337 18.337 0 0 0-.415-4.605l-.04-.17ZM10.957 0a18.125 18.125 0 0 1 1.424 3.792l.092.394-.174-.219A14.803 14.803 0 0 1 10.235.322L10.957 0ZM7.046 1.746c.277.725.494 1.463.653 2.206l.1.519-.012-.016a17.99 17.99 0 0 1-1.203-1.891l-.262-.495.724-.323Z"></path>
        </svg>
    </a>


@admin
    <ul class="flex items-center space-x-6">
        <li>
            <div class="relative group">
                <a href="#"
                   class="no-underline text-black hover:text-blue-800 hover:font-bold font-semibold text-xl md:text-blue-dark flex items-center py-4  group-hover:border-grey-light">
                    Profile
                </a>

                <div
                    class="items-center z-40 absolute border border-t-0 rounded-b-lg  bg-white  invisible group-hover:visible w-auto ">
                    <a href="{{route("profile.edit")}}" class="px-4 py-2 block text-black hover:text-blue-800">Edit</a>
                    <a href="{{route("profile.destroy")}}" class="px-4 py-2 block text-red-60 hover:text-red-800">Delete</a>
                    <form action="{{route("logout")}}" method="POST">
                        @csrf
                        <button type="submit" class="px-4 py-2 block text-red-60 hover:text-red-800">Logout</button>
                    </form>
                </div>
            </div>
        </li>


        <li class="font-semibold text-xl relative {{request()->is("posts/create")  ? "text-blue-800 font-bold before:content before:absolute before:bottom-0 before:left-0 before:w-full before:h-[3px] before:bg-blue-800" : "text-black"}} hover:text-blue-800 hover:font-bold transition duration-300 ease-linear">
            <a href="{{route("admin.users.index")}}">Registered Users</a>
        </li>
    </ul>

    @else
            <ul class="flex items-center space-x-6">

                @auth

                <li>
                    <div class="relative group">
                        <a href="#"
                           class="no-underline text-black hover:text-blue-800 hover:font-bold font-semibold text-xl md:text-blue-dark flex items-center py-4  group-hover:border-grey-light">
                            Profile
                        </a>

                        <div
                            class="items-center z-40 absolute border border-t-0 rounded-b-lg  bg-white  invisible group-hover:visible w-auto ">
                            <a href="{{route("profile.edit")}}" class="px-4 py-2 block text-black hover:text-blue-800">Edit</a>
                            <a href="{{route("profile.destroy")}}" class="px-4 py-2 block text-red-60 hover:text-red-800">Delete</a>
                            <form action="{{route("logout")}}" method="POST">
                                @csrf
                                <button type="submit" class="px-4 py-2 block text-red-60 hover:text-red-800">Logout</button>
                            </form>
                        </div>
                    </div>
                </li>
                <li class="font-semibold text-xl relative {{request()->is("posts/manage")  ? "text-blue-800 font-bold before:content before:absolute before:bottom-0 before:left-0 before:w-full before:h-[3px] before:bg-blue-800" : "text-black"}} hover:text-blue-800 hover:font-bold transition duration-300 ease-linear">
                    <a href="{{route("manage")}}">Manage Posts</a>
                </li>
                <li class="font-semibold text-xl relative {{request()->is("posts/create")  ? "text-blue-800 font-bold before:content before:absolute before:bottom-0 before:left-0 before:w-full before:h-[3px] before:bg-blue-800" : "text-black"}} hover:text-blue-800 hover:font-bold transition duration-300 ease-linear">
                    <a href="{{route("create")}}">Create Post</a>
                </li>



                @else
                    <li class="font-semibold text-xl relative {{request()->is("/")  ? "text-blue-800 font-bold before:content before:absolute before:bottom-0 before:left-0 before:w-full before:h-[3px] before:bg-blue-800" : "text-black"}} hover:text-blue-800 hover:font-bold transition duration-300 ease-linear">
                        <a href="{{route("welcome")}}">Home</a>
                    </li>
                    <li class="font-semibold text-xl relative {{request()->is("posts")  ? "text-blue-800 font-bold before:content before:absolute before:bottom-0 before:left-0 before:w-full before:h-[3px] before:bg-blue-800" : "text-black"}} hover:text-blue-800 hover:font-bold ">
                        <a href="{{route("index")}}">Posts</a>
                    </li>

                    <li>
                        <div class="relative group">
                            <a href="#"
                               class="no-underline text-black hover:text-blue-800 hover:font-bold font-semibold text-xl md:text-blue-dark flex items-center py-4  group-hover:border-grey-light">
                                Categories
                            </a>

                            <div
                                class="items-center z-40 absolute border border-t-0 rounded-b-lg  bg-white  invisible group-hover:visible w-auto ">
                                <a href="#" class="px-4 py-2 block text-black hover:text-blue-800">Education</a>
                                <a href="#" class="px-4 py-2 block text-black hover:text-blue-800">Health</a>
                                <a href="#" class="px-4 py-2 block text-black hover:text-blue-800">Technology</a>
                                <a href="#" class="px-4 py-2 block text-black hover:text-blue-800">Sport</a>
                                <a href="#" class="px-4 py-2 block text-black hover:text-blue-800">Lifestyle</a>
                                <a href="#" class="px-4 py-2 block text-black hover:text-blue-800">Cooking</a>
                            </div>
                        </div>
                    </li>


                    <li class="font-semibold text-xl relative {{request()->is("register")  ? "text-blue-800 font-bold before:content before:absolute before:bottom-0 before:left-0 before:w-full before:h-[3px] before:bg-blue-800" : "text-black"}}  hover:text-blue-800 hover:font-bold ">
                        <a href="{{route("register")}}">Register</a>
                    </li>

                    <li class="font-semibold text-xl relative {{request()->is("login")  ? "text-blue-800 font-bold before:content before:absolute before:bottom-0 before:left-0 before:w-full before:h-[3px] before:bg-blue-800" : "text-black"}}  hover:text-blue-800 hover:font-bold ">
                        <a href="{{route("login")}}">Login</a>
                    </li>
                @endauth
            </ul>

    @endadmin
</nav>


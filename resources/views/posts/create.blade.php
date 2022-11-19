<x-layout>


<section class=" min-h-screen bg-[#BEC9DE] flex justify-center items-center">

    <div class="p-8 lg:mt-0 rounded shadow bg-white w-[600px] h-fit ">

        <form action="{{route("store")}}" method="POST" enctype="multipart/form-data">
              @csrf

            <div class="md:flex mb-8 items-center">
                <div class="md:w-1/3">
                    <label for="title" class="block text-black font-bold md:text-left mb-3 md:mb-0 pr-4">
                        Title
                    </label>
                </div>
                <div class="md:w-2/3">
                    <input name="title" value="{{old("title")}}" id="title" class="block w-full bg-[#BEC9DE] outline-none px-4 py-2 font-semibold"  type="text" />
                    @error("title")
                    <p class="text-base text-center pt-2 text-red-600 font-semibold">{{$message}}</p>
                    @enderror
                </div>
            </div>

            <div class="md:flex mb-8">
                <div class="md:w-1/3">
                    <label  class="block text-black font-bold md:text-left mb-3 md:mb-0 pr-4" for="category">
                          Category
                    </label>
                </div>
                <div class="md:w-2/3 flex flex-col items-center">
                        <select  id="category" name="category" class=" block w-full outline-none bg-[#BEC9DE] px-4 py-2 font-semibold" >
                            <option value="{{old("category")}}">{{old("category")}}</option>
                            <option value="education">Education</option>
                            <option value="Health">Health</option>
                            <option value="Technology">Technology</option>
                            <option value="Sport">Sport</option>
                            <option value="Lifestyle">Lifestyle</option>
                            <option value="Cooking">Cooking</option>
                            <option value="Other">Other</option>
                        </select>
                    @error("category")
                    <p class="text-base pt-2 text-center text-red-600 font-semibold">{{$message}}</p>
                    @enderror
                </div>
            </div>

            <div class="md:flex mb-8">
                <div class="md:w-1/3">
                    <label class="block text-black font-bold md:text-left mb-3 md:mb-0 pr-4" for="content">
                        Content
                    </label>
                </div>
                <div class="md:w-2/3">
                    <textarea name="content" id="content" class="form-textarea block w-full outline-none bg-[#BEC9DE] px-4 py-2 font-semibold"  rows="8">{{old("content")}}</textarea>
                    @error("content")
                    <p class="text-base pt-2 text-center text-red-600 font-semibold">{{$message}}</p>
                    @enderror
                </div>
            </div>

            <div class="md:flex mb-8">

                <div class="md:w-1/3">
                    <label class="block text-black font-bold md:text-left mb-3 md:mb-0 pr-4" for="content">
                        Image
                    </label>
                </div>
                <div class="md:w-2/3">
                    <input type="file" name="image" value="{{old("image")}}">
                    @error("image")
                    <p class="text-base pt-2 text-center text-red-600 font-semibold">{{$message}}</p>
                    @enderror
                </div>
            </div>

            <div class="md:flex mb-8 items-center">
                <div class="md:w-1/3">
                    <label for="tags" class="block text-black font-bold md:text-left mb-3 md:mb-0 pr-4">
                        Tags
                    </label>
                </div>
                <div class="md:w-2/3">
                    <input value="{{old("tags")}}" name="tags" id="tags" class="block w-full bg-[#BEC9DE] outline-none px-4 py-2 font-semibold"  type="text" />
                    @error("tags")
                    <p class="text-base pt-2 text-center text-red-600 font-semibold">{{$message}}</p>
                    @enderror
                </div>
            </div>

            <div class="md:flex md:items-center">
                <div class="md:w-1/3"></div>
                <div class="md:w-2/3">
                    <button  class="shadow bg-blue-700 hover:bg-blue-800 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-6 rounded active:scale-95" type="submit">
                        Create
                    </button>
                </div>
            </div>

        </form>

    </div>

</section>


</x-layout>

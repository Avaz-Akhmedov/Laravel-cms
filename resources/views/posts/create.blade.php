<x-layout>
    @push("styles")
        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css"
              integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw=="
              crossorigin="anonymous" referrerpolicy="no-referrer"/>
    @endpush

    <section class=" min-h-screen bg-[#BEC9DE] flex justify-center items-center">

        <div class="p-8 lg:mt-0 rounded shadow bg-white w-[600px] h-fit ">

            <form action="{{route("post.store")}}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="md:flex mb-8 items-center">
                    <div class="md:w-1/3">
                        <label for="title" class="block text-black font-bold md:text-left mb-3 md:mb-0 pr-4">
                            Title
                        </label>
                    </div>
                    <div class="md:w-2/3">
                        <input name="title" value="{{old("title")}}" id="title"
                               class="block w-full bg-[#BEC9DE] outline-none px-4 py-2 font-semibold" type="text"/>
                        @error("title")
                        <p class="text-base text-center pt-2 text-red-600 font-semibold">{{$message}}</p>
                        @enderror
                    </div>
                </div>

                <div class="md:flex mb-8">
                    <div class="md:w-1/3">
                        <label class="block text-black font-bold md:text-left mb-3 md:mb-0 pr-4" for="category">
                            Category
                        </label>
                    </div>
                    <div class="md:w-2/3 flex flex-col items-center">

                        <select id="category" name="category_id" class=" block w-full outline-none bg-[#BEC9DE] px-4 py-2 font-semibold">

                            <option value=""></option>

                            @foreach($categories->unique("name") as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach

                        </select>

                        @error("category")
                        <p class="text-base pt-2 text-center text-red-600 font-semibold">{{$message}}</p>
                        @enderror
                    </div>
                </div>

                <div class="md:flex mb-8">
                    <div class="md:w-1/3">
                        <label class="block text-black font-bold md:text-left mb-3 md:mb-0 pr-4" for="summernote">
                            Content
                        </label>
                    </div>
                    <div class="md:w-2/3">
                        <textarea name="content" id="summernote"
                                  class="  block w-full outline-none bg-[#BEC9DE] px-4 py-2 font-semibold"
                                  rows="8">{{old("content")}}</textarea>
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

                        <select id="tags" name ="tags[]" class="form-control bg-[#BEC9DE] w-full px-4 flex py-4" multiple="multiple">
                            @foreach($tags as $tag)
                                <option  value="{{$tag->name}}">{{$tag->name}}</option>
                            @endforeach
                        </select>

                        @error("tags")
                        <p class="text-base pt-2 text-center text-red-600 font-semibold">{{$message}}</p>
                        @enderror
                    </div>
                </div>

                <div class="md:flex md:items-center">
                    <div class="md:w-1/3"></div>
                    <div class="md:w-2/3">
                        <button
                            class="shadow bg-blue-700 hover:bg-blue-800 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-6 rounded active:scale-95"
                            type="submit">
                            Create
                        </button>
                    </div>
                </div>

            </form>

        </div>

    </section>

    @push("scripts")
        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"
                integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A=="
                crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script>
            $('#summernote').summernote({
                focus: true,
                tabsize: 2,
                height: 100
            });

            $("#tags").select2({
                maximumSelectionLength: 10,
                tags: true,
                tokenSeparators: [',', ' '],
            });
        </script>
    @endpush
</x-layout>

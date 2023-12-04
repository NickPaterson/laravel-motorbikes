<x-app-layout>
    <div class="m-4 p-4">
    <form method="POST" action='{{ route('motorbike.update', ['motorbike' => $motorbike]) }}' enctype="multipart/form-data">
        @csrf

        @method('put')
        <!-- Motorbike Create Token -->
        <input type="hidden" name="token" value="{{ request()->route('token') }}">

        <!-- Title -->
        <div>
            <x-input-label for="title" :value="__('Title')" />
            <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" value="{{$motorbike->title}}" required autofocus />
            <x-input-error :messages="$errors->get('title')" class="mt-2" />
        </div>

        <!-- Images -->
        <x-input-label for="images" :value="__('Images')" class="mt-6 mb-2" />
        <div class="flex items-center justify-center w-full">
            <label for="images" class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                <!-- ... Your existing label content ... -->
                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                    <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                    </svg>
                    <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                    <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                </div>
                <!-- Image preview container -->
                <input id="images" type="file" name="images[]" class="hidden" multiple onchange="previewImages(this.files)" />
            </label>
        </div>
        <div id="imagePreview" class="flex flex-wrap mt-4"></div>

        <!-- Summary -->
        <div class="pt-6">
            <x-input-label for="summary" :value="__('Summary')" />
            <x-textarea-input id="summary" class="block mt-1 w-full" type="text" name="summary" value="{{$motorbike->summary}}" required autofocus>
                {{__($motorbike->summary)}}
            </x-textarea-input>
            <x-input-error :messages="$errors->get('summary')" class="mt-2" />
        </div>

        <!-- Description -->
        <div class="pt-6">
            <x-input-label for="description" :value="__('Description')" />
            <x-textarea-input id="description" class="block mt-1 w-full" type="text" name="description" value="{{$motorbike->descripton}}" required autofocus>
                {{__($motorbike->description)}}
            </x-textarea-input>
            <x-input-error :messages="$errors->get('description')" class="mt-2" />
        </div>

        <!-- Price -->
        <div class="pt-6">
            <x-input-label for="price" :value="__('Price')" />
            <x-text-input id="price" class="block mt-1 w-full" type="text" name="price" value="{{$motorbike->price}}" required autofocus />
            <x-input-error :messages="$errors->get('price')" class="mt-2" />
        </div>

        <!-- Category -->
        <div class="pt-6">
            <x-input-label for="category" :value="__('Category')" />
            <x-select-input id="category" class="block mt-1 w-full" name="category" value="{{$motorbike->category}}" required autofocus>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->category }}</option>
                @endforeach
            </x-select-input>
            <x-input-error :messages="$errors->get('category')" class="mt-2" />
        </div>

        <!-- Make -->
        <div class="pt-6">
            <x-input-label for="make" :value="__('Make')" />
            <x-text-input id="make" class="block mt-1 w-full" type="text" name="make" value="{{$motorbike->make}}" required autofocus />
            <x-input-error :messages="$errors->get('make')" class="mt-2" />
        </div>

        <!-- Model -->
        <div class="pt-6">
            <x-input-label for="model" :value="__('Model')" />
            <x-text-input id="model" class="block mt-1 w-full" type="text" name="model" value="{{$motorbike->model}}" required autofocus />
            <x-input-error :messages="$errors->get('model')" class="mt-2" />
        </div>

        <!-- Engine Size -->
        <div class="pt-6">
            <x-input-label for="engine" :value="__('Engine Size')" />
            <x-text-input id="engine" class="block mt-1 w-full" type="text" name="engine" value="{{$motorbike->engine}}" required autofocus />
            <x-input-error :messages="$errors->get('engine')" class="mt-2" />
        </div>

        <!-- Year -->
        <div class="pt-6">
            <x-input-label for="year" :value="__('Year')" />
            <x-text-input id="year" class="block mt-1 w-full" type="text" name="year" value="{{$motorbike->year}}" required autofocus />
            <x-input-error :messages="$errors->get('year')" class="mt-2" />
        </div>



        <div class="pt-6">
            <x-primary-button>
                {{ __('Update Motorbike') }}
            </x-primary-button>
        </div>
    </form>
    </div>
</x-app-layout>


<script>
    // Create an empty array 
    let tempImages = []; 
    const previewContainer = document.getElementById('imagePreview');
    function previewImages(files) {
        
        for (const file of files) {
            const reader = new FileReader();
            reader.onload = function (e) {
                const imageContainer = createImageContainer(file, e.target.result);

                // Save image info in the temp array
                tempImages.push({
                    file: file,
                    container: imageContainer
                });
            };
            reader.readAsDataURL(file);
        }
    }

    function removeImageFromArray(file) {
        tempImages = tempImages.filter(img => img.file !== file);
    }

    function createImageContainer(file, src) {
        const imageContainer = document.createElement('div');
        imageContainer.className = 'relative';

        // X button
        const deleteButton = document.createElement('button');
        deleteButton.className = 'absolute top-0 right-0 w-7 h-7 text-white bg-red-500 rounded-full';
        deleteButton.innerHTML = '&times;';
        deleteButton.onclick = function () {
            removeImageFromArray(file); 
            imageContainer.remove(); 
        };

        const imageElement = document.createElement('img');
        imageElement.src = src;
        imageElement.className = 'w-16 h-16 object-cover rounded-md m-2'; 

        imageContainer.appendChild(imageElement);
        imageContainer.appendChild(deleteButton);

        previewContainer.appendChild(imageContainer);

        return imageContainer;
    }

    // Preload existing images
    const existingImages = {!! json_encode($images) !!};
    for (const existingImage of existingImages) {
        const imageContainer = createImageContainer(existingImage, existingImage.url);
        console.log(existingImages);
    }

</script>
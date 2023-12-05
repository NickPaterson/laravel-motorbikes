<x-app-layout>
    <div class="m-4 p-4">
    {{-- @if (is_array($dvlaData))   
        {{ json_encode($dvlaData) }}
    @endif  --}}
        <form method="POST" action="{{ route('dvla-test.getVehicleInfo') }}">
        @csrf

        <x-input-label for="registration" :value="__('Registration Number')" />
        <x-text-input id="registration" type="text" name="registration" :value="old('registration')" class="mt-1 w-1/3"/>

            <button type="submit" class="ml-6 w-56 text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 focus:outline-none dark:focus:ring-green-800">
                Get Vehicle Details
            </button>

        </form>

        <form method="POST" action="{{ route('motorbike.store') }}" enctype="multipart/form-data">
            @csrf

            <!-- Motorbike Create Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <!-- Title -->
            <div>
                <x-input-label for="title" :value="__('Title')" />
                <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title') " required autofocus />
                <x-input-error :messages="$errors->get('title')" class="mt-2" />
            </div>

            <!-- Images -->

            {{-- <div class="pt-6">
                <x-input-label for="images" :value="__('Images')" />
                <x-file-input id="images" class="block mt-1 w-full" type="file" name="images[]" :value="old('images')" autofocus multiple />
                <x-input-error :messages="$errors->get('images')" class="mt-2" />
            </div> --}}
            {{-- 
                    <x-input-label for="images" :value="__('Images')" class="mt-6 mb-2" />
                    <div class="flex items-center justify-center w-full">    
                        <label for="images" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                </svg>
                                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                                <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                            </div>

                            <input id="images" type="file" name="images[]"  class="hidden"  multiple />
                        </label>
                    </div>  --}}
            <x-input-label for="images" :value="__('Images')" class="mt-6 mb-2" />
            <div class="flex items-center justify-center w-full">
                <label for="images" class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                        <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                        </svg>
                        <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                        <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                    </div>
                    <input id="images" type="file" name="images[]"  class="hidden" multiple  onchange="previewImages(this.files)"/>
                    
                </label>
            </div>
            <div id="imagePreview" class="flex flex-wrap mt-4"></div>

        <!-- Summary -->
            <div class="pt-6">
                <x-input-label for="summary" :value="__('Summary')" />
                <x-textarea-input id="summary" class="block mt-1 w-full" type="text" name="summary" :value="old('summary')" required autofocus>
                </x-textarea-input>
                <x-input-error :messages="$errors->get('summary')" class="mt-2" />
            </div>

            <!-- Description -->
            <div class="pt-6">
                <x-input-label for="description" :value="__('Description')" />
                <x-textarea-input id="description" class="block mt-1 w-full" type="text" name="description" :value="old('description')" required autofocus>
                </x-textarea-input>
                <x-input-error :messages="$errors->get('description')" class="mt-2" />
            </div>

            <!-- Price -->
            <div class="pt-6">
                <x-input-label for="price" :value="__('Price')" />
                <x-text-input id="price" class="block mt-1 w-full" type="text" name="price" :value="old('price')" required autofocus />
                <x-input-error :messages="$errors->get('price')" class="mt-2" />
            </div>

            <!-- Category -->
            <div class="pt-6">
                <x-input-label for="category" :value="__('Category')" />
                <x-select-input id="category" class="block mt-1 w-full" name="category" :value="old('category')" required autofocus>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->category }}</option>
                    @endforeach
                </x-select-input>
                <x-input-error :messages="$errors->get('category')" class="mt-2" />
            </div>

            <!-- Make -->
            <div class="pt-6">
                <x-input-label for="make" :value="__('Make')" />
                @if (is_array($dvlaData) && isset($dvlaData['make']))
                    <x-text-input id="make" class="block mt-1 w-full" type="text" name="make" value="{{$dvlaData['make']}}" required autofocus />
                @else
                    <x-text-input id="make" class="block mt-1 w-full" type="text" name="make" :value="old('make')" required autofocus />
                @endif
                <x-input-error :messages="$errors->get('make')" class="mt-2" />
            </div>

            <!-- Model -->
            <div class="pt-6">
                <x-input-label for="model" :value="__('Model')" />
                <x-text-input id="model" class="block mt-1 w-full" type="text" name="model" :value="old('model')" required autofocus />
                <x-input-error :messages="$errors->get('model')" class="mt-2" />
            </div>

            <!-- Engine Size -->
            <div class="pt-6">
                <x-input-label for="engine" :value="__('Engine Size')" />
                @if (is_array($dvlaData) && isset($dvlaData['engineCapacity']))
                    <x-text-input id="make" class="block mt-1 w-full" type="text" name="make" value="{{$dvlaData['engineCapacity']}}" required autofocus />
                @else
                    <x-text-input id="make" class="block mt-1 w-full" type="text" name="make" :value="old('make')" required autofocus />
                @endif
                <x-input-error :messages="$errors->get('engine')" class="mt-2" />
            </div>

            <!-- Year -->
            <div class="pt-6">
                <x-input-label for="year" :value="__('Year')" />
                @if (is_array($dvlaData) && isset($dvlaData['yearOfManufacture']))
                    <x-text-input id="make" class="block mt-1 w-full" type="text" name="make" value="{{$dvlaData['yearOfManufacture']}}" required autofocus />
                @else
                    <x-text-input id="make" class="block mt-1 w-full" type="text" name="make" :value="old('make')" required autofocus />
                @endif<x-input-error :messages="$errors->get('year')" class="mt-2" />
            </div>

            <div class="pt-6">
                <x-primary-button>
                    {{ __('Upload Motorbike') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-app-layout>

<script>
    let tempImages = []; // Array to store temporary images

    function previewImages(files) {
        const previewContainer = document.getElementById('imagePreview');
        
        for (const file of files) {
            const reader = new FileReader();

            reader.onload = function (e) {
                const imageContainer = document.createElement('div');
                imageContainer.className = 'relative';

                const deleteButton = document.createElement('button');
                deleteButton.className = 'absolute top-0 right-0 w-7 h-7 text-white bg-red-500 rounded-full';
                deleteButton.innerHTML = '&times;';
                deleteButton.onclick = function () {
                    removeImageFromArray(file); // Remove the image from the temp array
                    imageContainer.remove(); // Remove the image container when the delete button is clicked
                };

                const imageElement = document.createElement('img');
                imageElement.src = e.target.result;
                imageElement.className = 'w-16 h-16 object-cover rounded-md m-2'; // Adjust the size and styling as needed

                imageContainer.appendChild(imageElement);
                imageContainer.appendChild(deleteButton);

                previewContainer.appendChild(imageContainer);

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
</script>
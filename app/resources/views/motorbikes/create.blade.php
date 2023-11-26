<x-app-layout>
    <div class="m-4 p-4">
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

        <div class="pt-6">
            <x-input-label for="images" :value="__('Images')" />
            <input id="images" class="block mt-1 w-full" type="file" name="images[]" :value="old('images')" required autofocus multiple />
            <x-input-error :messages="$errors->get('images')" class="mt-2" />
        </div>

        {{-- <div class="pt-6">
            <x-input-label for="image" :value="__('Images')" />
            <x-file-input id="image" class="block mt-1 w-full" type="file" name="image" :value="old('images')" required autofocus />
            <x-input-error :messages="$errors->get('images')" class="mt-2" />
        </div> --}}


        <!-- Summary -->
        <div class="pt-6">
            <x-input-label for="summary" :value="__('Summary')" />
            <x-textarea-input id="summary" class="block mt-1 w-full" type="text" name="summary" :value="old('summary')" required autofocus />
            <x-input-error :messages="$errors->get('summary')" class="mt-2" />
        </div>

        <!-- Description -->
        <div class="pt-6">
            <x-input-label for="description" :value="__('Description')" />
            <x-textarea-input id="description" class="block mt-1 w-full" type="text" name="description" :value="old('description')" required autofocus />
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
            <x-text-input id="make" class="block mt-1 w-full" type="text" name="make" :value="old('make')" required autofocus />
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
            <x-text-input id="engine" class="block mt-1 w-full" type="text" name="engine" :value="old('engine')" required autofocus />
            <x-input-error :messages="$errors->get('engine')" class="mt-2" />
        </div>

        <!-- Year -->
        <div class="pt-6">
            <x-input-label for="year" :value="__('Year')" />
            <x-text-input id="year" class="block mt-1 w-full" type="text" name="year" :value="old('year')" required autofocus />
            <x-input-error :messages="$errors->get('year')" class="mt-2" />
        </div>



        <div class="pt-6">
            <x-primary-button>
                {{ __('Upload Motorbike') }}
            </x-primary-button>
        </div>
    </form>
    </div>
</x-app-layout>


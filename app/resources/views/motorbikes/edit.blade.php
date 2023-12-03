<x-app-layout>
    <div class="m-4 p-4">
    <form method="POST" action="{{ route('motorbike.edit', ['slug' => $motorbike->slug]) }}" enctype="multipart/form-data">
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
        <div class="pt-6">
            <x-input-label for="images" :value="__('Images')" />
            <x-file-input id="images" class="block mt-1 w-full" type="file" name="images[]" value="{{$motorbike->images}}" autofocus multiple />
            <x-input-error :messages="$errors->get('images')" class="mt-2" />
        </div>

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


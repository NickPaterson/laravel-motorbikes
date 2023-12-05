<x-app-layout>
  @if (is_array($dvlaData))
    {{ json_encode($dvlaData) }}
  @endif  
  <div class="sm:m-64">
    <form method="POST" action="{{ route('dvla-test.getVehicleInfo') }}" class="p-6">
      @csrf

      <label for="registration">Registration Number:</label>
      <input id="registration" type="text" name="registration" value="AA19AAA"/>

      <div class="pt-6">
        <x-primary-button>
            {{ __('Get Details') }}
        </x-primary-button>
      </div>
    </form>

    <div class="ml-6 pl-6">
    <form method="POST" action="{{ route('motorbike.store') }}" enctype="multipart/form-data">
        @csrf

        <!-- Motorbike Create Token -->
        {{-- <input type="hidden" name="token" value="{{ $request->route('token') }}"> --}}

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
            @if (is_array($dvlaData) && isset($dvlaData['model']))
              {{-- <x-text-input id="model" class="block mt-1 w-full" type="text" name="model" value="{{$dvlaData['model']}}" required autofocus /> --}}
            @else
              <x-text-input id="model" class="block mt-1 w-full" type="text" name="model" :value="old('model')" required autofocus />
            @endif
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

    </form>
    </div>
  </div>
</x-app-layout>
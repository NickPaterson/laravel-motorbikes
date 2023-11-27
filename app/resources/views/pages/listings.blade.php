<x-app-layout>
    @foreach ($motorbikes as $motorbike)
    <a href="/motorbikes/{{$motorbike->slug}}">
        <div class=" w-full lg:max-w-full lg:flex shadow-sm p-4">
        <div
            class="h-48 lg:h-auto lg:w-48 flex-none bg-cover rounded-t-md lg:rounded-t-none lg:rounded-l-md text-center overflow-hidden bg-center">
        <img src="{{ url('storage/'.$motorbike->thumbnail_url) }}" alt="motorbike thumbnail">
        </div>
        
        <div class="flex-1 border-r border-b border-l border-gray-400 lg:border-l-0 lg:border-t lg:border-gray-400 bg-white dark:bg-gray-800 rounded-b-md lg:rounded-b-none lg:rounded-r-md p-4 flex flex-col justify-between leading-normal">
            <div class="mb-8">
            <div class="text-gray-900 dark:text-white font-bold text-xl mb-2">{{$motorbike->title}}</div>
            <p class="text-gray-700 dark:text-white text-base">{{$motorbike->summary}}</p>
            </div>
            <div class="flex-row items-center dark:text-white">
                <p>£{{$motorbike->price}} | {{$motorbike->engine}} CC</p>
            </div>
        </div>
        </div>
    </a>
    @endforeach
</x-app-layout>

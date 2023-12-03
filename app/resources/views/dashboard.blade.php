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
            <div class="flex mt-6">
                <a href="/motorbike/edit/{{$motorbike->slug}}">
                    <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Edit</button>
                </a>
                <form method="POST" action="{{ route('motorbike.destroy', ['motorbike' => $motorbike->id]) }}">
                    @csrf
                    @method('delete')

                    
                    <button type="submit" class="text-white bg-red-700 hover:bg-red-700 focus:ring-4 focus:ring-red-700 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-700 dark:hover:bg-red-700 focus:outline-none dark:focus:ring-red-700">Delete</button>
                </form>
            </div>
        </div>
        </div>
    </a>
    @endforeach
</x-app-layout>

<x-app-layout>
    @if (count($motorbikes) == 0)
        <div class="flex justify-start ml-6">
            <div class="text-left">
                <h1 class="text-2xl font-bold">No Motorbikes Found</h1>
                <a href="/motorbike/create/">
                    <button type="button" class="mt-6 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Upload Motorbike</button>
                </a>
            </div>
        </div>
    @else
        @foreach ($motorbikes as $motorbike)
        
        <div class=" w-full lg:max-w-full lg:flex shadow-sm p-4">
            <div class="h-48 lg:h-56 lg:w-48 flex-none bg-cover rounded-t-md lg:rounded-t-none lg:rounded-l-md text-center overflow-hidden bg-center">
                <img src="{{ url('storage/'.$motorbike->thumbnail_url) }}" alt="motorbike thumbnail">
            </div>
            
            <div class="flex lg:flex-row flex-1 border-r border-b border-l border-gray-400 lg:border-l-0 lg:border-t lg:border-gray-400 bg-white dark:bg-gray-800 rounded-b-md lg:rounded-b-none lg:rounded-r-md p-4 flex flex-col justify-between leading-normal">
                <div class="flex flex-col mb-8 justify-between ">
                    <div class="">
                        <p class="text-gray-900 dark:text-white font-bold text-xl mb-2">{{$motorbike->title}}</p>
                        <p class="text-gray-700 dark:text-white text-base">{{$motorbike->summary}}</p>
                    </div>
                    
                    <div class="flex-row items-center dark:text-white">
                        <p>£{{$motorbike->price}} | {{$motorbike->engine}} CC</p>
                    </div>
                </div>
                

                <div class="flex flex-col">
                    <a href="/motorbikes/{{$motorbike->slug}}">
                         <button type="button" class="w-32 text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 focus:outline-none dark:focus:ring-green-800">
                            View
                        </button>
                    </a>
                    <a href="/motorbike/edit/{{$motorbike->slug}}">
                        <button type="button" class="w-32 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                            Edit
                        </button>
                    </a>

                    <form method="POST" action="{{ route('motorbike.destroy', ['motorbike' => $motorbike->id]) }}" class="md:mt-2">
                        @csrf
                        @method('delete')

                        <button type="submit" class="w-32 text-white bg-red-700 hover:bg-red-700 focus:ring-4 focus:ring-red-700 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-700 dark:hover:bg-red-700 focus:outline-none dark:focus:ring-red-700">
                            Delete
                        </button>
                    </form>
                </div>

            </div>
        </div>
        
        @endforeach
    @endif
</x-app-layout>

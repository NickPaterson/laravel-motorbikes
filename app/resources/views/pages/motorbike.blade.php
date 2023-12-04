<x-app-layout>
<div class="p-4">
    <h2 class="font-semibold text-xl pb-1 dark:text-gray-400">{{$motorbike->title}}</h2>

    <div id="default-carousel" class="relative w-full" data-carousel="slide">
        <!-- Carousel wrapper -->
        <div class="relative h-56 overflow-hidden rounded-lg md:h-96">

            {{-- <!-- Item 1 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="/images/test-img-1.jpg" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
            </div>
            <!-- Item 2 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="/images/test-img-2.jpg" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
            </div>
            <!-- Item 3 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="/images/test-img-3.jpg" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
            </div>
            <!-- Item 4 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="/images/test-img-4.jpg" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
            </div> --}}

            {{-- {{ dd($motorbike->images) }} --}}
            {{-- {{ $images = json_decode($motorbike->images, true) }} --}}
            {{-- {{dd($imagefile)}} --}}
           
            @if (!empty($images))
                @foreach ($images as $image)
                    {{-- {{dd($image->path)}} --}}
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        {{-- <img src='{{ asset("storage/") . $image->path }}' class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="..."> --}}
                        {{-- <img src="{{ asset('storage/images/3/3-testing/EqaFtOq99Z0oGmkw9UQqTAap42DjTcVP68qQQgBE.png') }}" alt="Image"> --}}
                        <img src="{{ url('storage/'.$image->path) }}" alt="{{ $image->originalName }}">
                    </div>
                @endforeach
            @else 
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        {{-- <img src='{{ asset("storage/") . $image->path }}' class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="..."> --}}
                        {{-- <img src="{{ asset('storage/images/3/3-testing/EqaFtOq99Z0oGmkw9UQqTAap42DjTcVP68qQQgBE.png') }}" alt="Image"> --}}
                        <img src="{{ url('storage/No-Image-Placeholder.png') }}" alt="No Image Available">
                    </div>
            @endif


        </div>
        <!-- Slider indicators -->
        <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
            <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 4" data-carousel-slide-to="3"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 5" data-carousel-slide-to="4"></button>
        </div>
        <!-- Slider controls -->
        <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
            <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                </svg>
                <span class="sr-only">Previous</span>
            </span>
        </button>
        <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
            <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                </svg>
                <span class="sr-only">Next</span>
            </span>
        </button>
    </div>

    <button type="button" class="mt-4 mb-4 py-2.5 px-5 me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Contact Seller</button>

    <div class="mb-4 border-b border-gray-200 dark:border-gray-700 pt-4">
        <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="default-tab" data-tabs-toggle="#default-tab-content" role="tablist">
            <li class="me-2" role="presentation">
                <button class="inline-block p-4 border-b-2 rounded-t-lg"
                        id="overview-tab"
                        data-tabs-target="#overview"
                        type="button"
                        role="tab"
                        aria-controls="overview"
                        aria-selected="false">
                    Overview
                </button>
            </li>
            <li class="me-2" role="presentation">
                <button class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                        id="specs-tab"
                        data-tabs-target="#specs"
                        type="button"
                        role="tab"
                        aria-controls="dashboard"
                        aria-selected="false">
                    Highlights
                </button>
            </li>
            <li class="me-2" role="presentation">
                <button class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                        id="desc-tab"
                        data-tabs-target="#desc"
                        type="button"
                        role="tab"
                        aria-controls="desc"
                        aria-selected="false">
                    Description
                </button>
            </li>

        </ul>
    </div>
    <div id="default-tab-content">
        <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="overview" role="tabpanel" aria-labelledby="overview-tab">
            <p class="text-sm text-gray-500 dark:text-gray-400">
                Price: £{{$motorbike->price}}

            </p>
        </div>
        <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="specs" role="tabpanel" aria-labelledby="specs-tab">
            <p class="text-sm text-gray-500 dark:text-gray-400">
                Make: {{$motorbike->make}}
                Model: {{$motorbike->model}}
                Year: {{$motorbike->year}}
            </p>
        </div>
        <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="desc" role="tabpanel" aria-labelledby="desc-tab">
            <p class="text-sm text-gray-500 dark:text-gray-400">
                {{$motorbike->description}}
            </p>
        </div>
    </div>




</div>
</x-app-layout>

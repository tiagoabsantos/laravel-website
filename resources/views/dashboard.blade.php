<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="space-x-4 flex justify-between">
                        <div class="inline-block">
                            <h1 class="text-3xl md:text-4xl font-medium ml-7 mt-7 text-gray-800">Latest Photos</h1>
                        </div>
                        <div class="inline-block">
                            <button onclick="window.location='{{ route('create') }}'" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded mr-7 mt-7">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path 
                                        fill-rule="evenodd" 
                                        d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" 
                                        clip-rule="evenodd" 
                                    />
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="p-10 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-3 gap-5">
                        @foreach ($allPhotos as $photo)
                            @if (count($allPhotos) >= 1)
                                @if ($photo->status === 1)
                                    <div class="rounded overflow-hidden shadow-lg">
                                        <img class="w-full" src="/storage/uploads/{{ $photo->image }}" alt="Mountain">
                                        <div class="px-6 py-4">
                                            <div class="font-bold text-xl mb-2">{{ $photo->name }}</div>
                                            <p class="text-gray-700 text-base">
                                                {{ $photo->description }}
                                            </p>
                                        </div>
                                        <div class="px-6 pt-4 pb-2">
                                            @foreach ($allTags as $tag)
                                                @if ($tag->photo_id === $photo->id)
                                                    <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#{{ $tag->tag }}</span>                                                
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                @endif
                            @else
                                <p>No photos yet!</p>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

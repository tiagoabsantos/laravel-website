<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Photo') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                <form method="POST" action="{{ route('add') }}" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <x-label for="name" :value="__('Name')" />
                        <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required />
                    </div>
                    <div class="mt-4">
                        <x-label for="description" :value="__('Description')" />
                        <x-input id="description" class="block mt-1 w-full" type="text" name="description" :value="old('description')" required />
                    </div>
                    <div class="mt-4">
                        <x-label for="image" :value="__('Image')" />
                        <x-input id="image" class="block mt-1 w-full"
                                        type="file"
                                        name="image" />
                    </div>
                    <div class="mt-4">
                        <x-label for="tags" :value="__('Tags')" />
                        <x-input id="tags" class="block mt-1 w-full" type="text" name="tags" :value="old('tags')" required />
                    </div>
                    <div class="flex items-center justify-end mt-4">
                        <x-button class="ml-4">
                            {{ __('Add') }}
                        </x-button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

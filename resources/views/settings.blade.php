<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User Settings') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div>
                        <x-label for="email" :value="__('Email')" />
                        <x-input id="email" class="block mt-1 w-full disabled:opacity-50" type="text" name="email" value="{{ Auth::user()->email }}" disabled />
                    </div>
                    <div class="mt-4">
                        <x-label for="name" :value="__('Name')" />
                        <x-input id="name" class="block mt-1 w-full disabled:opacity-50" type="text" name="name" value="{{ Auth::user()->name }}" disabled />
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
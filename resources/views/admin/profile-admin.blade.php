<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("Admin logged in!") }}
                </div>
                <a href="{{url('/admin')}}" class="py-3 px-5 flex justify-end">
                    <p class="hover:text-blue-500">Kembali</p>
                </a>
            </div>
        </div>
    </div>
</x-app-layout>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ver Categoria') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mb-6">
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ __('Categoria') }}
                        </h2>
                
                        <p class="mt-1 text-sm text-gray-600">
                            {{ $category->name }}
                        </p>
                    </div>
                    <a href="{{ route('categories.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md">Regresar</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
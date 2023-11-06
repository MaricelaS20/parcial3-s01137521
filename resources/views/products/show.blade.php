<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ver Producto') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mb-6">
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ __('Producto') }}
                        </h2>
                
                        <p class="mt-1 text-sm text-gray-600">
                            {{ $product->name }}
                        </p>
                        <p class="mt-1 text-sm text-gray-600">
                            {{ $product->description }}
                        </p>
                        <p class="mt-1 text-sm text-gray-600">
                            {{ $product->quantity }}
                        </p>
                        <p class="mt-1 text-sm text-gray-600">
                            {{ $product->price }}
                        </p>
                    </div>
                    <div class="container mt-4">

                        <div class="card">
                            <div class="card-header">
                            </div>
                            <div class="card-body">
                                  {!! QrCode::size(100)->generate(Request::url()); !!}
                            </div>
                        </div>
                    </div>
                    <a href="{{ route('products.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md">Regresar</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Productos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex justify-between">
                        <h1 class="text-2xl font-bold">{{ __('Productos') }}</h1>
                        <a href="{{ route('products.create') }}"
                            class="bg-indigo-500 hover:bg-indigo-700 text-dark font-bold py-2 px-4 rounded">Crear
                            producto</a>
                            <a href="{{ url('/barchart') }}" class="bg-indigo-500 hover:bg-indigo-700 text-dark font-bold py-2 px-4 rounded">Grafico</a>
                        <a href="{{ url('/pdf') }}" class="bg-indigo-500 hover:bg-indigo-700 text-dark font-bold py-2 px-4 rounded">Pdf</a>
                    </div>
                    <div class="mt-4">
                        <table class="table-auto w-full">
                            <thead class="text-xs font-semibold uppercase text-gray-400 bg-gray-50">
                                <tr>
                                    <th class="px-4 py-2">{{ __('Nombre') }}</th>
                                    <th class="px-4 py-2">{{ __('Descripción') }}</th>
                                    <th class="px-4 py-2">{{ __('Cantidad') }}</th>
                                    <th class="px-4 py-2">{{ __('Precio') }}</th>
                                    <th class="px-4 py-2">{{ __('Acciones') }}</th>
                                </tr>
                            </thead>
                            <tbody class="text-sm divide-y divide-gray-100">
                                @forelse ($products as $product)
                                    <tr>
                                        <td class="border px-4 py-2">{{ $product->name }}</td>
                                        <td class="border px-4 py-2">{{ $product->description }}</td>
                                        <td class="border px-4 py-2">{{ $product->quantity }}</td>
                                        <td class="border px-4 py-2">{{ $product->price }}</td>
                                        <td class="border px-4 py-2" style="width: 260px">
                                            <a href="{{ route('products.show', $product->id) }}"
                                                class="bg-blue-500 hover:bg-blue-700 text-dark font-bold py-2 px-4 rounded">{{ __('Ver') }}</a>
                                            <a href="{{ route('products.edit', $product) }}"
                                                class="bg-blue-500 hover:bg-blue-700 text-dark font-bold py-2 px-4 rounded">{{ __('Editar') }}</a>
                                            <form id="frmdelete" name="frmdelete" action="{{ route('products.destroy', $product) }}"
                                                method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">{{ __('Eliminar') }}</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr class="bg-red-400 text-dark text-center">
                                        <td colspan="3" class="border px-4 py-2">
                                            {{ __('No hay productos para mostrar') }}</td>
                                    </tr>
                                @endforelse
                            </tbody>
                            @if ($products->hasPages())
                                <tfoot class="text-xs font-semibold uppercase text-gray-400 bg-gray-50">
                                    <tr>
                                        <td colspan="3" class="border px-4 py-2">
                                            {{ $products->links() }}
                                        </td>
                                    </tr>
                                </tfoot>
                            @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @section('scripts')
        <script>
            $(document).on("submit","#frmdelete" , function(e) {
                e.preventDefault();

                Swal.fire({
                    title: 'Esta seguro?',
                    text: "No de podrá revertir",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si, borralo!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire(
                            'Borrado!',
                            'Tu regsitro ha sido borrado.',
                            'success'
                        )
                    }
                })
            });
        </script>
    @endsection
</x-app-layout>

<div>
    <table class="table-auto w-full">
        <tr>
            <td>
                <?php
                $dt = new DateTime();
                echo $dt->format('Y-m-d H:m:s');
                ?>
            </td>
        </tr>
    </table>
</div>
<div class="mt-4">
    <table class="table-auto w-full">
        <thead class="text-xs font-semibold uppercase text-gray-400 bg-gray-50">
            <tr>
                <th class="px-4 py-2">{{ __('Id') }}</th>
                <th class="px-4 py-2">{{ __('Nombre') }}</th>
                <th class="px-4 py-2">{{ __('Descripicion') }}</th>
                <th class="px-4 py-2">{{ __('Cantidad') }}</th>
                <th class="px-4 py-2">{{ __('Precio') }}</th>
            </tr>
        </thead>
        <tbody class="text-sm divide-y divide-gray-100">
            @forelse ($products as $product)
                <tr>
                    <td class="border px-4 py-2">{{ $product->id }}</td>
                    <td class="border px-4 py-2">{{ $product->name }}</td>
                    <td class="border px-4 py-2">{{ $product->description }}</td>
                    <td class="border px-4 py-2">{{ $product->quantity }}</td>
                    <td class="border px-4 py-2">{{ $product->price }}</td>
                </tr>
            @empty
                <tr class="bg-red-400 text-dark text-center">
                    <td colspan="5" class="border px-4 py-2">{{ __('No hay productos para mostrar') }}</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
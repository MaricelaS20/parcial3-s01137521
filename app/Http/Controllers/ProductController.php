<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\Support\Renderable;

class ProductController extends Controller
{
    public function index():Renderable
    {
        $products = Product::paginate(5);
        return view('products.index', compact('products'));
    }

    public function create(): Renderable
    {
        $product = new Product;
        $title = __('Crear producto');
        $action = route('products.store');
        $buttonText = __('Crear producto');
        $categories = Category::all();
        return view('products.form', compact('product', 'title', 'action', 'buttonText', 'categories'));
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'Nombre' => 'required|string',
            'Desciripcion' => 'required|string|max:1000',
            'Cantidad' => 'required|numeric',
            'Precio' => 'required|numeric'
        ]);

        $newprod = Product::create([
            'name' => $request->string('Nombre'),
            'description' => $request->string('Desciripcion'),
            'quantity' => $request->input('Cantidad'),
            'price' => $request->input('Precio'),
        ]);
        dd($newprod);

        return redirect()->route('products.index');
    }

    public function show(string $id): Response
    {
        return response()->view('products.show', ['product' => Product::findOrFail($id),]);
    }

    public function edit(Product $product): Renderable
    {
        $title = __('Editar producto');
        $action = route('products.update', $product);
        $buttonText = __('Actualizar producto');
        $method = 'PUT';
        return view('products.form', compact('product', 'title', 'action', 'buttonText', 'method'));
    }

    public function update(Request $request, Product $product): RedirectResponse
    {
        $request->validate([
            'Nombre' => 'required|unique:products,name,' . $product->id . '|string|max:100',
            'Desciripcion' => 'required|string|max:1000',
            'Cantidad' => 'required|numeric',
            'Precio' => 'required|numeric',
        ]);
        $product->update([
            'name' => $request->string('Nombre'),
            'descripction' => $request->string('Desciripcion'),
            'quantity' => $request->input('Cantidad'),
            'price' => $request->input('Precio'),
        ]);

        return redirect()->route('products.index');
    }

    public function destroy(Product $product): RedirectResponse
    {
        $product->delete();
        return redirect()->route('products.index');
    }

    public function getPDF(){
        $products = Product::all();
        $pdf = PDF::loadView('products.PDF_Example', compact('products'));
        return $pdf->stream('listaproductos.pdf');
    }
}

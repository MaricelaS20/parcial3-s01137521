<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\Support\Renderable;

class CategoryController extends Controller
{
    //
    public function index():Renderable
    {
        $categories = Category::paginate(5);
        return view('categories.index', compact('categories'));
    }

    public function create(): Renderable
    {
        $category = new Category;
        $title = __('Crear categorias');
        $action = route('categories.store');
        $buttonText = __('Crear categoria');
        return view('categories.form', compact('category', 'title', 'action', 'buttonText'));
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'Nombre' => 'required|unique:categories,name|string|max:100',
        ]);
        Category::create([
            'name' => $request->string('Nombre'),
        ]);
        return redirect()->route('categories.index');
    }

    public function show(Category $category): Renderable
    {
        $category->load('user:id,name');
        return view('categories.show', compact('category'));
    }

    public function edit(Category $category): Renderable
    {
        $title = __('Editar categoria');
        $action = route('categories.update', $category);
        $buttonText = __('Actualizar categoria');
        $method = 'PUT';
        return view('categories.form', compact('category', 'title', 'action', 'buttonText', 'method'));
    }

    public function update(Request $request, Category $category): RedirectResponse
    {
        $request->validate([
            'Nombre' => 'required|unique:categories,name,' . $category->id . '|string|max:100'
        ]);
        $category->update([
            'name' => $request->string('Nombre')
        ]);
        return redirect()->route('categories.index');
    }

    public function destroy(Category $category): RedirectResponse
    {
        $category->delete();
        return redirect()->route('categories.index');
    }
}

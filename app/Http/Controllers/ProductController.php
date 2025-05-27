<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Distillery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('distillery')->paginate(10);
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $distilleries = Distillery::all();
        return view('admin.products.create', compact('distilleries'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'distillery_id' => 'required|exists:distilleries,id',
            'is_featured' => 'sometimes'
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('products', 'public');
        }

        Product::create($validated);

        return redirect()->route('admin.products.index')
            ->with('success', 'Proizvod uspešno dodat');
    }

    public function edit(Product $product)
    {
        $distilleries = Distillery::all();
        return view('admin.products.edit', compact('product', 'distilleries'));
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'distillery_id' => 'required|exists:distilleries,id',
            'is_featured' => 'sometimes'
        ]);

        if ($request->hasFile('image')) {
            Storage::delete($product->image);
            $validated['image'] = $request->file('image')->store('products', 'public');
        }

        $product->update($validated);

        return redirect()->route('admin.products.index')
            ->with('success', 'Proizvod uspešno ažuriran');
    }

    public function destroy(Product $product)
    {
        Storage::delete($product->image);
        $product->delete();
        return redirect()->route('admin.products.index')
            ->with('success', 'Proizvod uspešno obrisan');
    }

// Move these methods to a separate controller, e.g., CatalogController.php

// public function index()
// {
//     $products = Product::with('distillery')->paginate(9);
//     return view('catalog', compact('products'));
// }

// public function show(Product $product)
// {
//     return view('products.show', compact('product'));
// }
}
